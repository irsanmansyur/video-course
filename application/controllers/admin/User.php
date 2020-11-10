<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(["rules_model", "user_model"]);
    $this->load->library('form_validation');
  }
  private $rules = array(
    [
      'field' => 'name',
      'label' => 'Nama User',
      'rules' => 'required',
      'errors' => [
        'required' => "Tidak bole kosong \n %s"
      ],
    ],
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|is_unique[users.username]'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required',
      'errors' => array(
        'required' => 'You must provide a %s.',
      ),
    ),
    array(
      'field' => 'confirmpassword',
      'label' => 'Password Confirmation',
      'rules' => 'required|matches[password]',
      'errors' => array(
        'matches' => '<b> %s.</b> Harus sama dengan Password',
      ),
    ),
    array(
      'field' => 'email',
      'label' => 'email',
      'rules' => 'required|is_unique[users.email]'
    ),
    array(
      'field' => 'role_id',
      'label' => 'Harap Pilih Role',
      'rules' => 'required'
    ),
  );
  public function index()
  {
    $this->load->model('visitor_m');
    $dt = $this->visitor_m->getVisitor()->result_array();
    $this->template->load('admin', 'user/dashboard', $this->data);
  }
  public function list()
  {
    in_role([1, 2]);
    $this->db->select("u.*,u.id,u.name,rules.name as name_rules");
    $this->db->from("users u")
      ->where_not_in("u.id", [1, 2]);

    $this->db->join('access_role_user', 'access_role_user.user_id = u.id')
      ->join('rules', 'rules.id=access_role_user.role_id')->group_by("u.id");
    $users = $this->db->get();

    $data = [
      'page_title' => "List Users",
      'users'  => $users,
    ];

    $this->template->load('admin', 'user/index', $data);
  }
  public function add()
  {
    $userS = $this->user_model;
    $userS->role_id = null;
    $userS->jabatan = null;
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->rules);
    if ($this->input->post("role_id") == "2") {
      $this->form_validation->set_rules("jabatan", "Jabatan", "required|min_length[5]");
    }

    if ($this->form_validation->run()) {
      $rule_id = $this->input->post('role_id');
      $email = $this->input->post('email');
      $name =  $this->input->post('name');
      $jabatan =  $this->input->post('jabatan');
      $username =  $this->input->post('username');
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $status = $this->input->post('status');
      $data = compact(["email", 'username', 'password', 'name', 'status']);
      $user = $this->user_model->save($data);

      $accessRole = ['role_id' => $rule_id, "user_id" => $user->id];
      if ($rule_id == "1" || $rule_id == "2") {
        $accessRole['jabatan'] = $jabatan ? $jabatan : "Karyawan";
      }
      $this->db->insert("access_role_user", $accessRole);
      $this->session->set_flashdata('success', 'Pendaftaran berhasil');
      redirect(base_url('admin/user/list'));
    } else {
      $rules = $this->db->from("rules")->where_not_in("id", [1])->get()->result();
      $data = [
        'page_title' => "Tambah User",
        'rules' => $rules,
        'user_edit' => $userS,
      ];
      $this->template->load('admin', 'user/add', $data);
    }
  }
  function edit($id)
  {
    $user = $this->user_model->getUserEdit($id);

    $rules = $this->db->from("rules")->where_not_in("id", [1])->get()->result();
    $validRules = '';
    foreach ($rules as $key => $rule) {
      if (count($rules) == $key + 1)
        $validRules .=  $rule->id;
      else
        $validRules .=  $rule->id . ",";
    }

    $validUsername = $this->input->post("username") != $user->username ? "|is_unique[users.username]" : '';
    $validEmail = $this->input->post("email") !== $user->email ? "|is_unique[users.email]" : '';
    $this->form_validation->set_rules("name", "Nama User", "required|min_length[4]");
    $this->form_validation->set_rules("username", "Nama User", "required|min_length[3]" . $validUsername);
    $this->form_validation->set_rules("email", "User Email", "required|valid_email" . $validEmail);
    $this->form_validation->set_rules("status", "User Status", "required|in_list[1,2]");
    $this->form_validation->set_rules("role_id", "User Rules", "required|in_list[$validRules]");
    if ($this->input->post("role_id") == "2")
      $this->form_validation->set_rules("jabatan", "User Jabatan", "required|min_length[4]");
    if ($this->input->post("password")) {
      $this->form_validation->set_rules("password", "Password", "required|min_length[3]");
      $this->form_validation->set_rules("confirmpassword", "Password Konfirmasi", "required|matches[password]");
    }
    if ($this->form_validation->run() == false) {

      $data = [
        'page_title' => "edit User",
        'user_edit' => $user,
        'rules' => $rules,
      ];
      $this->template->load('admin', 'user/edit', $data);
    } else {

      $rule_id = $this->input->post('role_id');
      $email = $this->input->post('email');
      $name =  $this->input->post('name');
      $jabatan =  $this->input->post('jabatan');
      $username =  $this->input->post('username');
      $status = $this->input->post('status');
      $data = compact(["email", 'username', 'password', 'name', 'status']);
      $data['profile'] = $this->upload($user->profile);
      if ($this->input->post("password"))
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $user->update($data);


      if ($rule_id != $user->role_id) {
        $accessRole = ['role_id' => $rule_id, "user_id" => $user->id];
        if ($rule_id == "1" || $rule_id == "2") {
          $accessRole['jabatan'] = $jabatan ? $jabatan : "Karyawan";
        }
        $this->db->insert("access_role_user", $accessRole);
        $this->db->where('role_id', $user->role_id);
        $this->db->where('user_id', $user->id);
        $this->db->delete("access_role_user");
      }
      $this->session->set_flashdata('success', 'Edit Data User berhasil');
      redirect(base_url('admin/user/list'));
    }
  }
  private function upload($filename = 'default.jpg')
  {
    if ($_FILES['gambar']['name']) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']      = '2048';
      $config['upload_path'] = './assets/img/profile/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        if (is_file(FCPATH . 'assets/img/profile/' . $filename) && $filename != 'default.jpg')
          unlink(FCPATH . 'assets/img/profile/' . $filename);

        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("danger", $this->upload->display_errors());
      }
    }

    return $filename;
  }
  function getLog()
  {
    $this->data['log'] = $this->log_model->getId()->result_array();
    $this->template->load('admin', 'user/log/test', $this->data);
  }
  function profile()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('tentang_saya', 'Tentang Saya', 'required|trim');

    if ($this->form_validation->run() == false) {

      $this->data['page']['title'] = 'Profile User';
      $this->data['page']['description'] = 'Silahkan lihat data profile anda, dan ubah jika ada yang tidak sesuai dengan anda, </br> Inggat data harus real.!';
      // $this->data['page']['before'] = ['url' => base_url('admin/menu'), "title" => "Menu Access"];
      $this->data['page']['submenu'] = 'Profile User';


      $this->template->load('admin', 'user/profile/index', $this->data);
    } else {

      $upload_image = $_FILES['image']['name'];

      $file = $this->data['user']['file'];
      $id_file = $this->data['user']['file_id'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = '2048';
        $config['upload_path'] = './assets/img/profile/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          if (is_file(FCPATH . 'assets/img/profile/' . $file))
            unlink(FCPATH . 'assets/img/profile/' . $file);
          if (is_file(FCPATH . 'assets/img/thumbnail/profile/' . $file))
            unlink(FCPATH . 'assets/img/thumbnail/profile_' . $file);

          $newFile = $this->upload->data('file_name');
          $this->_create_thumbs($newFile);

          $this->load->model("file_model");
          $dt = [
            'file' => $newFile
          ];
          $this->file_model->update($id_file, $dt);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $data = [
        'no_hp' => htmlspecialchars($this->input->post('no_hp')),
        'tentang_saya' => htmlspecialchars($this->input->post('tentang_saya')),
        'name' => htmlspecialchars($this->input->post('name')),
        'alamat' => htmlspecialchars($this->input->post('alamat')),
        'tgl_lahir' => strtotime($this->input->post('tgl_lahir'))
      ];
      $this->user_model->update($data);
      hasilCUD("Data Berhasil di Ubah");
      header("Refresh:0");
    }
  }

  function changepassword()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('newPassword', 'Password', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('password', 'Repeat Password', 'trim|required|min_length[3]|matches[newPassword]');

    if ($this->form_validation->run() == false) {
      $this->data['page']['title'] = 'Mengganti Password';
      $this->data['page']['description'] = 'Silahkan ubah password lama anda, gunakan karakter yang susah di tebak.!';
      // $this->data['page']['before'] = ['url' => base_url('admin/menu'), "title" => "Menu Access"];
      $this->data['page']['submenu'] = 'Ganti password';
      $this->template->load('admin', 'user/profile/changepassword', $this->data);
    } else {
      $oldPassword = $this->input->post('oldPassword');
      // cek kebenran password lama
      if (password_verify($oldPassword, $this->data['user']['password'])) {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $email = $this->session->userdata('email');
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('tbl_user');
        if ($this->db->affected_rows() > 0) {
          $this->session->unset_userdata('email');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
          redirect('admin/auth');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal.!</div>');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak cocok.!</div>');
        redirect('admin/user/changepassword');
      }
    }
  }

  public function laporan_pdf()
  {
    $this->load->model('publikasi_model', 'publikasi');
    $this->load->model('pendidikan_model', 'pendd');
    $this->load->model('jabatan_model', 'jabatan');
    $this->load->model('pelatihan_model', 'pelatihan');

    $this->data['get_publikasi'] = $this->publikasi->getId()->result_array();
    $this->data['get_jabatan'] = $this->jabatan->getId()->result_array();
    $this->data['get_pelatihan'] = $this->pelatihan->getId()->result_array();
    $this->data['get_pendd'] = $this->pendd->getId([
      'pendd_user.user_id' => $this->data['user']['id']
    ])->result_array();

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-petanikode.pdf";

    $html = $this->load->view('index2', $this->data);
    // $this->pdf->load_html($html);
    // $this->pdf->render();
    // $this->pdf->stream($this->pdf->filename, array("Attachment" => false));
  }
  function _create_thumbs($file_name)
  {
    // Image resizing config
    $config = array(
      // Large Image
      // array(
      //     'image_library' => 'GD2',
      //     'source_image'  => './assets/images/' . $file_name,
      //     'maintain_ratio' => FALSE,
      //     'width'         => 700,
      //     'height'        => 467,
      //     'new_image'     => './assets/images/large/' . $file_name
      // ),
      // Medium Image
      // array(
      //     'image_library' => 'GD2',
      //     'source_image'  => './assets/images/' . $file_name,
      //     'maintain_ratio' => FALSE,
      //     'width'         => 600,
      //     'height'        => 400,
      //     'new_image'     => './assets/images/medium/' . $file_name
      // ),
      // Small Image
      array(
        'image_library' => 'GD2',
        'source_image'  => './assets/img/profile/' . $file_name,
        'maintain_ratio' => FALSE,
        'width'         => 100,
        'height'        => 100,
        'new_image'     => './assets/img/thumbnail/profile_' . $file_name
      )
    );

    $this->load->library('image_lib', $config[0]);
    foreach ($config as $item) {
      $this->image_lib->initialize($item);
      if (!$this->image_lib->resize()) {
        return false;
      }
      $this->image_lib->clear();
    }
  }

  function notif()
  {
    $this->template->load('admin', 'admin/notif', $this->data);
  }
  function notif_action()
  {
    $link = 'admin/notif';
    $this->data['get_notif'] =  $this->notif_model->getId()->row_array();
    $read = $this->notif_model->read();
    $this->template->load('admin', 'admin/notif_action', $this->data);
  }

  function setting()
  {
    foreach ($_POST as $key => $value) {
      $where['name'] = htmlspecialchars($key);
      $data['title'] = htmlspecialchars($value);
    }
    $this->setting_m->update($where, $data);
  }
}
