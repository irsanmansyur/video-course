<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalkulator extends MY_Controller
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
  public function __construct()
  {
    parent::__construct();
    if (!is_login()) {
      $this->session->set_flashdata("danger", "Silahkan Login Terlebih dahulu!");
      redirect("/login");
    }
    $this->load->model(["Pembayaran_model"]);
  }
  public function index()
  {
    $pembayaran = $this->Pembayaran_model->first("user_id", user()->id);
    if (!$pembayaran) {
      $this->session->set_flashdata("warning", "Untuk Bisa menikmati layanan kami, anda bisa melakukan pembayaran terlebih dahulu");
      return redirect("/pembayaran");
    } else if ($pembayaran->status != 1) {
      if ($pembayaran->status == 0) {
        $data['status'] = "Mohon bersabar , pembayaran anda sedang tahap proses... kami akan segera menghubungi anda jika pembayaran anda telah di verifikasi";
      } else   if ($pembayaran->status == 2) {
        $data['status'] = "Pembayaran Anda di Tolak ..!, Dengan Alasan : \" $pembayaran->alasan \"";
      }
      $this->session->set_flashdata("warning", $data['status']);
      return  $this->template->load('public', 'kalkulator/partials/belum_diverifikasi', array_merge($data, compact([])), false);
    }
    $data = [
      "page_title" => "Selamat Datang",
      'active' => "intrinsic_value",
    ];
    $this->load->library("form_validation");
    $this->form_validation->set_rules("cash_flow", "Operoting Cash Flow (Current)", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("total_debt", "Total Debt ", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("cash_and_short", "Cash and Short Term Investments ", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("shares_outstanding", "No. of Shares Outstanding", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("percent_tp", "Cash Flow Growth Rate", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("percent_te", "Cash Flow Growth Rate", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("discount_rate", "Discount Rate", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    if ($this->form_validation->run()) {
      $this->_kalIntrinsicValue();
    }

    $this->template->load('public', 'kalkulator/index', array_merge($data, compact([])));
  }
  private function _kalIntrinsicValue()
  {
    $cashFlow = $this->input->post("cash_flow");
    $totalDebt = $this->input->post("total_debt");
    $cashAndShort = $this->input->post("cash_and_short");
    $sharesOutstanding = $this->input->post("shares_outstanding");
    $percentTP = ($this->input->post("percent_tp")) / 100;
    $percentTE = ($this->input->post("percent_te")) / 100;
    $discountRate = ($this->input->post("discount_rate")) / 100;


    $currentYear = date("Y", time());
    $years = [];
    $year10 = 0;
    $cashFlowThLima = 0;
    for ($i = 0; $i < 10; $i++) {
      $discountFactor =  1 / (1 * pow(1 + $discountRate, $i + 1));
      if ($i < 5) {
        $cashFlowth =  $cashFlowThLima = $cashFlow *  pow(1 + $percentTP, $i + 1);
      } else {
        $cashFlowth  = $cashFlowThLima *  pow(1 + $percentTE, $i - 4);
      }
      $discountedValue = $cashFlowth * $discountFactor;
      $year10 += $discountedValue;
      $years[$currentYear + $i] = [
        'cashflow' =>  $cashFlowth,
        'discountFactor' => number_format($discountFactor, 2),
        'discountedValue' => $discountedValue,
      ];
    }

    $intrinsicValue = $year10 / $sharesOutstanding;
    $debtPerShare = $totalDebt / $sharesOutstanding;
    $cashPerShare = $cashAndShort / $sharesOutstanding;
    $data = [
      'years' => $years,
      'year10' => $year10,
      "intrinsicValue" => $intrinsicValue,
      "debtPerShare" => $debtPerShare,
      "cashPerShare" => $cashPerShare,
      "finalIntrinsicValuePerShare" => $intrinsicValue - $debtPerShare + $cashPerShare,
    ];
    $this->data = array_merge($this->data, $data);
    return $data;
  }
  public function cagr()
  {
    $pembayaran = $this->Pembayaran_model->first("user_id", user()->id);
    if (!$pembayaran) {
      $this->session->set_flashdata("warning", "Untuk Bisa menikmati layanan kami, anda bisa melakukan pembayaran terlebih dahulu");
      return redirect("/pembayaran");
    } else if ($pembayaran->status != 1) {
      if ($pembayaran->status == 0) {
        $data['status'] = "Mohon bersabar , pembayaran anda sedang tahap proses... kami akan segera menghubungi anda jika pembayaran anda telah di verifikasi";
      } else   if ($pembayaran->status == 2) {
        $data['status'] = "Pembayaran Anda di Tolak ..!, Dengan Alasan : \" $pembayaran->alasan \"";
      }
      $this->session->set_flashdata("warning", $data['status']);
      return  $this->template->load('public', 'kalkulator/partials/belum_diverifikasi', array_merge($data, compact([])), false);
    }
    $this->load->library("form_validation");
    $this->form_validation->set_rules("start_date_value", "Start Date Value", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("end_date_value", "End Date Value ", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $this->form_validation->set_rules("year", "Year ", "numeric|required", [
      'required'      => 'Anda harus mengisi %s.',
      "numeric" => "Mohon input hanya angka"
    ]);
    $data = [
      "page_title" => "Selamat Datang",
      'active' => "cagr"
    ];
    if ($this->form_validation->run()) {
      $startValue = $this->input->post("start_date_value");
      $endValue = $this->input->post("end_date_value");
      $year = $this->input->post("year");
      $data["growthRate"] = number_format(($endValue - $startValue) / $startValue * 100, 2);
      $data["compoundAnnual"] = number_format(((pow(($endValue / $startValue), (1 / $year))) - 1) * 100, 2);
    }
    $this->template->load('public', 'kalkulator/index', array_merge($data, compact([])));
  }
}
