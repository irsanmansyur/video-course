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
  public function isAdmin($limit)
  {
    $this->db->select("{$this->_table}.*,rules.name as name_role,access_role_user.jabatan");
    $this->db->join("access_role_user", "access_role_user.user_id={$this->_table}.id", "left")
      ->join('rules', 'rules.id=access_role_user.role_id')
      ->where_in("rules.id", [2])
      ->or_where_in("rules.name", ["Admin"]);
    return $this->all("_newFields");
  }
  public function getUserEdit($id)
  {
    $this->db->select("{$this->_table}.*,rules.name as name_rules,rules.id as role_id,access_role_user.jabatan");
    $this->db->join("access_role_user", "access_role_user.user_id={$this->_table}.id")
      ->join('rules', 'rules.id=access_role_user.role_id')
      ->where("{$this->_table}.id", $id);
    return $this->first("_newFields");
  }
  public function takeProfile()
  {
    $image = [base_url("assets/img/profile/default.jpg"), base_url("assets/img/profile/default.png"), base_url("assets/img/no-image.png")];
    if (isset($this->profile)) {
      if (is_file(FCPATH . 'assets/img/profile/' . $this->profile))
        return base_url('assets/img/profile/' . $this->profile);
    }
    return $image[array_rand($image)];
  }
  public function referal()
  {
    return $this->first('username', $this->codeReferal);
  }
}
