<?php
class Masukan_model extends CI_Model
{
  protected $_table = "masukan";
  protected $_rules = [
    array(
      'field' => 'name',
      'label' => 'Nama',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'email',
      'label' => 'email',
      'rules' => 'required|valid_email'
    ),
    array(
      'field' => 'subject',
      'label' => 'Judul',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'message',
      'label' => 'pesan',
      'rules' => 'required|min_length[3]'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
  }
}
