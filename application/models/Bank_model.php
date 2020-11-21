
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
  protected $_table = 'banks';
  protected $_rules = [
    array(
      'field' => 'name',
      'label' => 'Nama Bank',
      'rules' => 'required|min_length[3]'
    ),
    array(
      'field' => 'rek',
      'label' => 'Nama Rekening',
      'rules' => 'required|min_length[3]'
    ),
  ];
  protected $_afterDelete = ['deleteImage'];
  public function __construct()
  {
    parent::__construct();
  }

  public function takeImage()
  {
    if (isset($this->image)) {
      if (is_file(FCPATH . 'assets/img/bank/' . $this->image))
        return base_url('assets/img/bank/' . $this->image);
    }
    return base_url('assets/img/no-image.png');
  }
  public function deleteImage($data)
  {
    if (isset($data->image) && is_file(FCPATH . 'assets/img/bank/' . $data->image) && $data->image != 'default.jpg')
      unlink(FCPATH . 'assets/img/bank/' . $data->image);
    return $data;
  }
}
