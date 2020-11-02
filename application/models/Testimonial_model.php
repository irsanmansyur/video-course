
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial_model extends CI_Model
{
  protected $_table = 'testimonial';
  protected $_rules = [
    array(
      'field' => 'keterangan',
      'label' => 'Keterangan testimonial',
      'rules' => 'required|min_length[10]'
    ),
    array(
      'field' => 'user_id',
      'label' => 'User',
      'rules' => 'required'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model(["Kategori_model", "user_model"]);
  }
  public function user()
  {
    // $user = $this->belongsTo($this->user_model);
    $user = $this->belongsTo($this->user_model, "user_id");
    return $user;
  }
}
