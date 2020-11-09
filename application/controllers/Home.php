<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->load->model(["testimonial_model", "kategori_model"]);

    $kategories = $this->kategori_model->all(6);
    $testimonials = $this->testimonial_model->all(10);
    $data = [
      "page_title" => "Selamat Datang",
    ];

    $this->template->load('public', 'home/index', array_merge($data, compact(['testimonials', "kategories"])));
  }
}
