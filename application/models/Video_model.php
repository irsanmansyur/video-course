<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
  protected $_table = 'videos';
  protected $_afterDelete = ["deleteVideo"];
  protected $_rules = [
    array(
      'field' => 'title',
      'label' => 'Judul Video',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'description',
      'label' => 'Deskripsi Video',
      'rules' => 'required|min_length[10]'
    ),
    array(
      'field' => 'kategori_id',
      'label' => 'Kategori Video',
      'rules' => 'required'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Kategori_model");
  }
  public function lastNoUrut()
  {
    return   $this->getLastId("no_urut");;
  }
  public function kategori()
  {
    // $kategori = $this->Kategori_model->first($this->kategori_id);
    $kategori = $this->belongsTo($this->kategori_model);
    return $kategori;
  }
  public function countVideo()
  {
    $count = $this->db->count_all_results($this->getTable());
    return $count;
  }
  public function deleteVideo($data)
  {
    if (is_file(FCPATH . 'assets/video/' . $data->file) && $data->file != 'default.mp4')
      unlink(FCPATH . 'assets/video/' . $data->file);
  }
}
