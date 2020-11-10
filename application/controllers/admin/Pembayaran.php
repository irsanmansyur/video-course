<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembayaran extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!in_role("Admin"))
      return $this->not_permition();
    $this->load->library('form_validation');
    $this->load->model(['pembayaran_model', "user_model"]);
  }
  public function index()
  {
    if ($this->input->get("type") == "belum_acc")
      $this->pembayaran_model->db->where_not_in('status', [1]);
    elseif ($this->input->get("type") == "diterima")
      $this->pembayaran_model->db->where('status', 1);
    $pembayarans = $this->pembayaran_model->all();
    $data = [
      'page_title' => "Daftar Pembayaran User",
    ];
    $this->template->load('admin', 'pembayaran/index', array_merge($data, compact(['pembayarans'])));
  }
  public function detail($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);
    if (!$pembayaran) return $this->not_permition();

    if ($this->input->method() == "post") {
      $pembayaran->updated = '  ';
      if ($this->input->post('alasan')) {
        $pembayaran->alasan = $this->input->post('alasan');
        $pembayaran->status = 2;

        $pembayaran->update();
        flashDataDB("warning", "Pembayaran telah di Tolak");
      } else {
        $pembayaran->status = 1;
        $pembayaran->alasan = " ";
        $pembayaran->update();
        flashDataDB("success", "Pembayaran telah di diterima");
      }
      return redirect("admin/pembayaran?type=belum_acc");
    }

    $data = [
      'page_title' => "Details Pembayaran dari User",
    ];
    $this->template->load('admin', 'pembayaran/detail', array_merge($data, compact(['pembayaran'])));
  }
  public function belum_acc()
  {
    $pembayarans = $this->pembayaran_model->all();

    $users = $this->user_model->all();
    $pembayaran = $this->pembayaran_model;

    $this->form_validation->set_rules($pembayaran->getRules());
    if ($this->form_validation->run()) {
      $pembayaran->save();
      flashDataDB("success", "Pembayaran telah di tambahkan");
      return redirect("admin/pembayaran");
    }
    $data = [
      'page_title' => "Tambah Pembayaran Video",
    ];
    $this->template->load('admin', 'pembayaran/tambah', array_merge($data, compact(['pembayaran', "users"])));
  }
  public function edit($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);

    if (!$pembayaran) return $this->not_permition();

    $users = $this->user_model->all();
    $this->form_validation->set_rules($pembayaran->getRules());
    if ($this->form_validation->run()) {
      $pembayaran->update();
      flashDataDB("success", "Pembayaran telah di Edit");
      return redirect("admin/pembayaran");
    }
    $data = [
      'page_title' => "Edit Pembayaran dari User",
    ];
    $this->template->load('admin', 'pembayaran/edit', array_merge($data, compact(['pembayaran', "users"])));
  }
  public function delete($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);

    if (!$pembayaran) return $this->not_permition();
    $pembayaran->delete();
    echo json_encode(flashDataDB('success', "Pembayaran dari " . $pembayaran->user()->name . " Telah di hapus"));
  }
}
