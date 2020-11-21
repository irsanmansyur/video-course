<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bank extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();

    if (!in_role("Admin")) {
      return $this->not_permition();
    }
    $this->load->library('form_validation');
    $this->load->model('bank_model');
  }
  public function index()
  {
    $banks = $this->bank_model->all();
    $data = [
      'page_title' => "Daftar Bank",
    ];
    $this->template->load('admin', 'bank/index', array_merge($data, compact(['banks'])));
  }
  public function tambah($bank = null)
  {
    $bank = $this->bank_model;
    $this->form_validation->set_rules($bank->getRules());

    if ($this->form_validation->run()) {

      $image = $this->upload($bank->image);
      if (!$image)
        return back();

      $bank->image = $image;
      $bank->save();
      flashDataDB("success", "Bank berhasil di tambahkan");
      return redirect("admin/bank");
    }
    $data = [
      'page_title' => "Tambah Bank",
    ];
    $this->template->load('admin', 'bank/tambah', array_merge($data, compact(['bankes', 'bank', "bank"])));
  }
  public function edit($id, $bank = null)
  {
    $bank = $this->bank_model->first($id);
    if (!$bank) return $this->not_permition();

    $this->form_validation->set_rules($bank->getRules());

    if ($this->form_validation->run()) {
      $bank->image = $this->upload($bank->image);
      $bank->update();
      flashDataDB("success", "Bank berhasil di Di edit");
      return redirect("admin/bank");
    }
    $data = [
      'page_title' => "Tambah Bank",
    ];
    $this->template->load('admin', 'bank/edit', array_merge($data, compact(['bankes', 'bank', "bank"])));
  }
  public function delete($id, $bank = null)
  {
    $bank = $this->bank_model->first($id);
    if (!$bank || $this->input->method() !== "post") return $this->not_permition();
    $bank->delete();
    echo json_encode(flashDataDB('success', $bank->name . " Telah di hapus"));
  }
  private function upload($filename = 'default.jpg')
  {
    if ($_FILES['gambar']['name']) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']      = '2048';
      $config['upload_path'] = './assets/img/bank/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        if (is_file(FCPATH . 'assets/img/bank/' . $filename) && $filename != 'default.jpg')
          unlink(FCPATH . 'assets/img/bank/' . $filename);
        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("image", "<div class='error text-danger'>{$this->upload->display_errors()}</div>");
        return false;
      }
    } else
      $this->session->set_flashdata("image", "<div class='error text-danger'>Gambar Tidak Boleh Kosong</div>");

    return $filename;
  }
}
