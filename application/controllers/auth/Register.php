<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!function_exists('is_login')) {
      $this->load->helper('auth_helper');
    }
  }
  public function index($type = null)
  {
    if (is_login()) {
      $this->session->set_flashdata("warning", "anda sudah login");
      if ($type == "user") {
        return redirect(base_url('/'));
      }
      return redirect(base_url('auth/login'));
    }
    $this->load->library("form_validation");
    $this->form_validation->set_rules(
      'email',
      'Email',
      'trim|required|valid_email|is_unique[users.email]',
      array(
        'required'      => 'Anda harus mengisi %s.',
        'is_unique'     => '%s ini sudah terdaftar.'
      )
    );
    if ($type == "user") {
      $this->form_validation->set_rules(
        'nama_depan',
        'Nama Depan',
        'trim|required|min_length[3]',
        array(
          'required'      => 'Anda harus mengisi %s.',
          'is_unique'     => '%s ini sudah terdaftar.'
        )
      );
      $this->form_validation->set_rules('nama_belakan', 'Nama Belakan', 'trim');
    } else {
      $this->form_validation->set_rules(
        'fullname',
        'Fullname',
        'trim|required',
        array(
          'required'      => 'Anda harus mengisi %s.'
        )
      );
    }
    $this->form_validation->set_rules(
      'username',
      'Username',
      'trim|required|is_unique[users.username]',
      array(
        'required'      => 'Anda harus mengisi %s.',
        'is_unique'     => '%s ini sudah terdaftar.'
      )
    );
    $this->form_validation->set_rules(
      'passwordsignin',
      'Password',
      'trim|required|min_length[3]',
      array(
        'required'      => 'Anda harus mengisi %s.',
        'min_length'     => 'Panjang karakter %s min 3 huruf .'
      )
    );
    $this->form_validation->set_rules(
      'confirmpassword',
      'confirmpassword',
      'trim|required|matches[passwordsignin]',
      array(
        'required'      => 'Anda harus mengisi %s.',
        'matches'     => 'Password Konfirmasi harus sama dengan password .'
      )
    );
    if ($this->input->post("codeReferal")) {
      $referal = $this->db->get_where("users", ["username" => $this->input->post("codeReferal")])->row();
      if (!$referal) {
        $this->form_validation->set_rules('codeReferal', 'Kode Referal', 'trim|required|in_list[tablsdsde_fduserjajsajsb]', ["in_list" => "Kode Referal anda tidak diketahui"]);
      }
    }
    if ($this->form_validation->run() == false) {
      $data = [
        'form' => [
          "action_register" => base_url('auth/register'),
        ],
      ];
      if ($type == "user")
        $this->template->load('public', 'auth/register', $data);
      else $this->template->load('admin', 'auth/register', $data);
    } else {
      // validasinya success
      $this->_register($type);
    }
  }
  private function _register($type)
  {
    $this->load->model(["rules_model", "user_model"]);
    $email = $this->input->post('email');
    $name =  $this->input->post('fullname') ? $this->input->post('fullname') : $this->input->post('nama_depan') . " " . $this->input->post('nama_belakan');
    $username =  $this->input->post('username');
    $password = password_hash($this->input->post('passwordsignin'), PASSWORD_DEFAULT);
    $status = 1;

    $data = compact(["email", 'username', 'password', 'name', 'status']);

    $jkl = $this->input->post('jkl');
    if ($jkl) $data["jkl"] = $jkl;
    $data["codeReferal"] = $this->input->post("codeReferal");
    $user = $this->user_model->save($data);


    $rule = $this->rules_model->first("name", "User");
    if (!$rule || !isset($rule->id)) $rule = $this->rules_model->save(['name' => "User"]);
    $this->db->insert("access_role_user", ['role_id' => $rule->id, "user_id" => $user->id]);

    $this->session->set_flashdata('success', 'Pendaftaran berhasil');
    if ($type == "user")
      return redirect('login');
    return redirect('auth/login');
  }
}
