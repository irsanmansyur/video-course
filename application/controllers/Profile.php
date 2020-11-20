<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(["user_model", "Pembayaran_model"]);
  }
  public function index()
  {
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih dahulu!");
      redirect("/login");
    }
    $pembayaran = $this->Pembayaran_model->first("user_id", user()->id);

    $data = [
      "page_title" => "Selamat Datang",
      'status' =>  !$pembayaran ? 9 : $pembayaran->status
    ];

    $this->template->load('public', 'profile/index', array_merge($data, compact(['pembayaran'])));
  }
}
