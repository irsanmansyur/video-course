
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
  protected $_table = 'pembayaran';
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
    return $this->belongsTo($this->user_model);
  }
  public function getTakeBuktiPembayaran()
  {
    return base_url("assets/img/pembayaran/" . $this->bukti_pembayaran);
  }
}
