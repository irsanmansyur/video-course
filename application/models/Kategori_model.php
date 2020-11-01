
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
  protected $_table = 'kategories';
  protected $_rules = [
    array(
      'field' => 'name',
      'label' => 'Nama kategori',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'keterangan',
      'label' => 'Keterangan kategori',
      'rules' => 'required|min_length[10]'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model("video_model");
  }
  public function countVideo()
  {
    $this->video_model->where("kategori_id", $this->id);
    return  $this->video_model->db->count_all_results($this->video_model->getTable());
  }
  public function videos($limit = null, $start = null)
  {
    $this->video_model->db->order_by("no_urut");
    $this->video_model->db->limit($limit, $start);
    return $this->video_model->all("kategori_id", $this->id);
  }
  public function countAll()
  {
    return  $this->db->count_all_results($this->getTable());
  }
}
