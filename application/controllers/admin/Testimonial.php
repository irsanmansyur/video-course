<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimonial extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!in_role("Admin"))
      return $this->not_permition();
    $this->load->library('form_validation');
    $this->load->model(['testimonial_model', "user_model"]);
  }
  public function index()
  {
    $testimonials = $this->testimonial_model->all();

    $data = [
      'page_title' => "Daftar Testimonial User",
    ];
    $this->template->load('admin', 'testimonial/index', array_merge($data, compact(['testimonials'])));
  }
  public function tambah()
  {
    $users = $this->user_model->all();
    $testimonial = $this->testimonial_model;

    $this->form_validation->set_rules($testimonial->getRules());
    if ($this->form_validation->run()) {

      $foto  = $this->upload($testimonial->foto);
      if (!$foto) return back();
      $testimonial->foto  = $foto;
      $testimonial->save();
      flashDataDB("success", "Testimonial telah di tambahkan");
      return redirect("admin/testimonial");
    }
    $data = [
      'page_title' => "Tambah Testimonial Video",
    ];
    $this->template->load('admin', 'testimonial/tambah', array_merge($data, compact(['testimonial', "users"])));
  }
  public function edit($id)
  {
    $testimonial = $this->testimonial_model->first($id);

    if (!$testimonial) return $this->not_permition();

    $users = $this->user_model->all();
    $this->form_validation->set_rules($testimonial->getRules());
    if ($this->form_validation->run()) {
      $foto  = $this->upload($testimonial->foto);
      if (!$foto) return back();
      $testimonial->foto = $foto;
      $testimonial->update();
      flashDataDB("success", "Testimonial telah di Edit");
      return redirect("admin/testimonial");
    }
    $data = [
      'page_title' => "Edit Testimonial dari User",
    ];
    $this->template->load('admin', 'testimonial/edit', array_merge($data, compact(['testimonial', "users"])));
  }
  public function delete($id)
  {
    $testimonial = $this->testimonial_model->first($id);

    if (!$testimonial) return $this->not_permition();
    $testimonial->delete();
    echo json_encode(flashDataDB('success', "Testimonial dari " . $testimonial->user()->name . " Telah di hapus"));
  }
  private function upload($filename = 'default.jpg')
  {
    if ($_FILES['foto']['name']) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size']      = '2048';
      $config['upload_path'] = './assets/img/testimonial/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        if (is_file(FCPATH . 'assets/img/testimonial/' . $filename) && $filename != 'default.jpg')
          unlink(FCPATH . 'assets/img/testimonial/' . $filename);
        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("foto", "<div class='error text-danger'>{$this->upload->display_errors()}</div>");
        return false;
      }
    }
    return $filename;
  }
}
