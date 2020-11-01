
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
  protected $_table = 'Pembayaran';
  protected $_rules = [
    array(
      'field' => 'jumlah',
      'label' => 'Jumlah Pembayaran',
      'rules' => 'required|is_numeric'
    ),
    array(
      'field' => 'user_id',
      'label' => 'User',
      'rules' => 'required'
    ),
    array(
      'field' => 'bukti_pembayaran',
      'label' => 'Bukti Pembayaran',
      'rules' => 'required'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
    $this->load->model(["user_model"]);
  }
  public function user()
  {
    return $this->user_model->first($this->user_id);
  }
}
