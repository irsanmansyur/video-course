<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('kategori_model');
  }
  public function index()
  {
    $kategories = $this->kategori_model->all();
    $data = [
      'page_title' => "Daftar Kategori",
    ];
    $this->template->load('admin', 'kategori/index', array_merge($data, compact(['kategories'])));
  }
  public function tambah($kategori = null)
  {
    $kategori = $this->kategori_model;
    $this->form_validation->set_rules($kategori->getRules());

    if ($this->form_validation->run()) {
      if ($_FILES['gambar']['name']) {
        $image = $this->upload($kategori->image);
        if (!$image)
          return back();
        $kategori->image = $image;
      }
      $kategori->save();
      flashDataDB("success", "Kategori berhasil di tambahkan");
      return redirect("admin/kategori");
    }
    $data = [
      'page_title' => "Tambah Kategori",
    ];
    $this->template->load('admin', 'kategori/tambah', array_merge($data, compact(['kategories', 'kategori', "kategori"])));
  }
  public function edit($id, $kategori = null)
  {
    $kategori = $this->kategori_model->first($id);
    if (!$kategori) return $this->not_permition();

    $this->form_validation->set_rules($kategori->getRules());

    if ($this->form_validation->run()) {
      $kategori->image = $this->upload($kategori->image);
      $kategori->update();
      flashDataDB("success", "Kategori berhasil di Di edit");
      return redirect("admin/kategori");
    }
    $data = [
      'page_title' => "Tambah Kategori",
    ];
    $this->template->load('admin', 'kategori/edit', array_merge($data, compact(['kategories', 'kategori', "kategori"])));
  }
  public function delete($id, $kategori = null)
  {
    $kategori = $this->kategori_model->first($id);
    if (!$kategori || $this->input->method() !== "post") return $this->not_permition();
    $kategori->delete();
    echo json_encode(flashDataDB('success', $kategori->name . " Telah di hapus"));
  }
  private function upload($filename = 'default.jpg')
  {
    if ($_FILES['gambar']['name']) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']      = '2048';
      $config['upload_path'] = './assets/img/kategori/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        if (is_file(FCPATH . 'assets/img/kategori/' . $filename) && $filename != 'default.jpg')
          unlink(FCPATH . 'assets/img/kategori/' . $filename);
        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("image", "<div class='error text-danger'>{$this->upload->display_errors()}</div>");
        return false;
      }
    }
    return $filename;
  }
}
