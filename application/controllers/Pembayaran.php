<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
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
    $this->load->model(["Pembayaran_model", "bank_model"]);
  }
  public function index()
  {
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih dahulu!");
      redirect("/login");
    }
    $pembayaran = $this->Pembayaran_model->first("user_id", user()->id);

    $banks = $this->bank_model->all();
    $data = [
      "page_title" => "Invoice Pembayaran",
    ];

    $this->template->load('public', 'pembayaran/index', array_merge($data, compact(["pembayaran", "banks"])));
  }
  public function upload()
  {

    $settings = $this->setting->getSettings();
    $cekPmbyrn = $this->Pembayaran_model->first("user_id", user()->id);
    if ($cekPmbyrn) {
      $pembayaran = $cekPmbyrn;
    } else {
      $pembayaran = $this->Pembayaran_model;
      $pembayaran->jumlah = $settings->harga_member;
    }

    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size']      = '2048';
    $config['upload_path'] = './assets/img/pembayaran/';
    $this->load->library('upload', $config);


    if ($this->upload->do_upload('file')) {
      if ($cekPmbyrn) {
        if (is_file(FCPATH . 'assets/img/pembayaran/' . $pembayaran->bukti_pembayaran) && $pembayaran->bukti_pembayaran != 'default.jpg')
          unlink(FCPATH . 'assets/img/pembayaran/' . $pembayaran->bukti_pembayaran);
      }
    } else {
      $this->session->set_flashdata("danger", $this->upload->display_errors());
      return false;
    }
    $filename = $this->upload->data('file_name');


    $pembayaran->user_id = user()->id;
    $pembayaran->bukti_pembayaran = $filename;
    $pembayaran->status = 0;
    $pembayaran->updated = 1;
    if ($cekPmbyrn) {
      $pembayaran->update();
    } else {
      $pembayaran->save();
    }
  }
}
