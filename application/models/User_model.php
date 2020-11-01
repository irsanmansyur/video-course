<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  protected $_table = 'users';


  public function __construct()
  {
    parent::__construct();
  }
  public function Rules()
  {
    $this->load->model("role_user_model");
    $rules = $this->role_user_model;
    return $this->hasMany($rules);
  }
  public function countUser()
  {
    $this->db->where('id !=', 1);
    $this->db->where('id !=', 2);
    $this->db->from($this->_table);
    return $this->db->count_all_results();
  }
}
