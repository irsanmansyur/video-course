<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends MY_Controller
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
    $this->load->model(["testimonial_model", "kategori_model", "user_model", "Pembayaran_model"]);
  }
  public function index()
  {
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih dahulu!");
      redirect("/login");
    }
    $pembayaran = $this->Pembayaran_model->first("user_id", user()->id);
    if (!$pembayaran) {
      $this->session->set_flashdata("warning", "Untuk Bisa menikmati layanan kami, anda bisa melakukan pembayaran terlebih dahulu");
      return redirect("/pembayaran");
    } else if ($pembayaran->status != 1) {
      $data['status'] = "Mohon bersabar , pembayaran anda sedang tahap proses... kami akan segera menghubungi anda jika pembayaran anda telah di verifikasi";
      $this->session->set_flashdata("warning", $data['status']);
      return     $this->template->load('public', 'video/partials/belum_diverifikasi', array_merge($data, compact([])));
      return redirect("/home");
    }


    $kategories = $this->kategori_model->all();
    $admins = $this->user_model->isAdmin(8);

    $testimonials = $this->testimonial_model->all(10);
    $data = [
      "page_title" => "Selamat Datang",
    ];

    $this->template->load('public', 'video/index', array_merge($data, compact(['testimonials', "admins", "kategories"])));
  }
}
