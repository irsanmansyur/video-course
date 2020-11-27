
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Why_us_model extends CI_Model
{
  protected $_table = 'why_us';
  protected $_rules = [
    array(
      'field' => 'name',
      'label' => 'Nama',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'val',
      'label' => 'isi name',
      'rules' => 'required|min_length[1]'
    ),
  ];

  public function __construct()
  {
    parent::__construct();
  }
}
