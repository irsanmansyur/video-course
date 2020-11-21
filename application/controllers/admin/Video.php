<?php
defined("BASEPATH") or exit("No Direct Script Access Allowed");
class Video extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(["video_model", "kategori_model"]);
    $this->load->library("form_validation");
  }
  public function index()
  {
    //konfigurasi pagination
    $config['base_url'] = base_url("admin/video/index/"); //site url
    $config['total_rows'] = $this->video_model->countVideo(); //total row

    $config['per_page'] = 6;  //show record per halaman
    $config["uri_segment"] = 4;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);

    $config = array_merge($config, $this->paginateStyle());
    $data = [
      'page_title' => "Daftar Video ",
    ];


    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $this->db->order_by("no_urut");
    $this->video_model->db->limit($config['per_page'], $data['page']);
    $videos = $this->video_model->all();


    $data['pagination'] = $this->pagination->create_links();


    $this->template->load('admin', 'video/index', array_merge($data, compact(['kategori', 'videos'])));
  }
  public function kategori($id)
  {

    $kategori = $this->kategori_model->first($id);

    if (!$kategori) return $this->not_permition();

    //konfigurasi pagination
    $config['base_url'] = base_url("admin/video/kategori/{$kategori->id}"); //site url
    $config['total_rows'] = $kategori->countVideo(); //total row
    $config['per_page'] = 6;  //show record per halaman
    $config["uri_segment"] = 5;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
    $config = array_merge($config, $this->paginateStyle());

    $data = [
      'page_title' => "Daftar Video pada Kategori $kategori->name",
    ];

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

    $videos = $kategori->videos($config['per_page'], $data['page']);
    $data['pagination'] = $this->pagination->create_links();


    $this->template->load('admin', 'video/index', array_merge($data, compact(['kategori', 'videos'])));
  }

  public function tambah($kategori = null)
  {
    $kategori && $kategori = $this->kategori_model->first($kategori);

    $video = $this->video_model;

    $kategories = $this->kategori_model->all();


    $this->form_validation->set_rules($video->getRules());
    if ($this->form_validation->run()) {
      if (!$_FILES['video']['name']) {
        $this->session->set_flashdata("video", "<div class='error text-danger'>Please Select Video</div>");
        return back();
      }
      $file = $this->upload($video->name);
      if (!$file)  return back();
      $video->file = $file;
      $video->save();
      flashDataDB("success", "Video berhasil di tambahkan");
      return redirect("admin/video" . ($kategori ? "/kategori/{$kategori->id}" : ''));
    }
    $data = [
      'page_title' => "Tambah Video",
    ];
    $this->template->load('admin', 'video/tambah', array_merge($data, compact(['kategories', 'video', "kategori"])));
  }
  public function paginateStyle()
  {
    // Membuat Style pagination untuk BootStrap v4
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    return $config;
  }

  public function edit($id, $kategori = null)
  {
    $video = $this->video_model->first($id);
    if (!$video) return $this->not_permition();
    $kategori && $kategori = $this->kategori_model->first($kategori);

    $kategories = $this->kategori_model->all();

    $this->form_validation->set_rules($video->getRules());
    if ($this->form_validation->run()) {
      if ($_FILES['video']['name']) {
        $file =  $this->upload($video->file);
        if (!$file) return back();
        $video->file = $file;
      }
      $video->update();
      flashDataDB("success", "Video berhasil di edit");
      return redirect("admin/video" . ($kategori ? "/kategori/{$kategori->id}" : ''));
    }
    $data = [
      'page_title' => "Tambah Video",
    ];
    $this->template->load('admin', 'video/edit', array_merge($data, compact(['kategories', 'video',  "kategori"])));
  }
  public function delete($id, $kategori = null)
  {
    $video = $this->video_model->first($id);
    if (!$video || $this->input->method() !== "post") return $this->not_permition();
    $video->delete();
    echo json_encode(flashDataDB('success', $video->title . " Telah di hapus"));
  }
  private function upload($filename = 'default.mp4')
  {
    if ($_FILES['video']['name']) {
      $config['allowed_types'] = 'wmv|mp4|avi|mov|mkv';
      $config['max_size']      = '1338800';
      $config['upload_path'] = './assets/video/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('video')) {
        if (is_file(FCPATH . 'assets/video/' . $filename) && $filename != 'default.mp4')
          unlink(FCPATH . 'assets/video/' . $filename);
        $filename = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata("video", "<div class='error text-danger'>{$this->upload->display_errors()}</div>");
        return false;
      }
    }
    return $filename;
  }
}
