<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Masukan extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();

    if (!in_role("Admin")) {
      return $this->not_permition();
    }
    $this->load->library('form_validation');
    $this->load->model('masukan_model');
  }
  public function index()
  {
    $masukans = $this->masukan_model->all();
    $data = [
      'page_title' => "Daftar Masukan",
    ];
    $this->template->load('admin', 'masukan/index', array_merge($data, compact(['masukans'])));
  }

  private function upload($filename = 'default.jpg')
  {
    if ($_FILES['gambar']['name']) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']      = '2048';
      $config['upload_path'] = './assets/img/masukan/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        if (is_file(FCPATH . 'assets/img/masukan/' . $filename) && $filename != 'default.jpg')
          unlink(FCPATH . 'assets/img/masukan/' . $filename);
        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("image", "<div class='error text-danger'>{$this->upload->display_errors()}</div>");
        return false;
      }
    }
    return $filename;
  }
}
