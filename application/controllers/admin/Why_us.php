<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Why_us extends Admin_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->model(["why_us_model"]);
    $this->load->library("form_validation");
  }
  public function index()
  {
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih dahulu!");
      redirect("/login");
    };

    $whyUses = $this->why_us_model->all();
    $data = [
      "page_title" => "Selamat Datang",
    ];
    $this->template->load('admin', 'why-us/index', array_merge($data, compact(['whyUses'])));
  }
  public function tambah()
  {

    $whyUs = $this->why_us_model;
    $this->form_validation->set_rules($whyUs->getRules());
    if ($this->form_validation->run()) {
      $whyUs->save();
      flashDataDB("success", "Testimonial telah di tambahkan");
      return redirect("admin/why_us");
    }
    $data = [
      'page_title' => "Tambah Why Us",
    ];
    $this->template->load('admin', 'why-us/tambah', array_merge($data, compact(['whyUs'])));
  }
  public function edit($id)
  {
    $whyUs = $this->why_us_model->first($id);
    if (!$whyUs) return $this->not_permition();

    $this->form_validation->set_rules($whyUs->getRules());
    if ($this->form_validation->run()) {
      $whyUs->update();
      flashDataDB("success", "Why us telah di Edit");
      return redirect("admin/why_us");
    }
    $data = [
      'page_title' => "Edit Why us",
    ];
    $this->template->load('admin', 'why-us/edit', array_merge($data, compact(['whyUs'])));
  }
  public function delete($id)
  {
    $why_us = $this->why_us_model->first($id);
    if (!$why_us) return $this->not_permition();
    $why_us->delete();
    echo json_encode(flashDataDB('success', "Why Us Telah di hapus"));
  }
}
