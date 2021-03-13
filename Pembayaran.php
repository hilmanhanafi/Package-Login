<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pembayaran_model', 'model');
    $this->load->library('form_validation');
    $this->load->library('pdf');
  }


  public function index()
  {
    $data['pembayaran'] = $this->model->getdata();
    $this->load->view('layouts/header');
    $this->load->view('pembayaran/index', $data);

    $this->load->view('layouts/footer');
  }

  public function cetak()
  {

    $data['pembayaran'] = $this->model->getData();
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-data-pembayaran.pdf";
    $this->pdf->load_view('pembayaran/laporan', $data);
  }

  public function get_nisn()
  {
    $nisn = $this->input->post('nisn');
    $data = $this->model->data_nisn($nisn);
    echo json_encode($data);
  }

  public function get_spp()
  {
    $spp = $this->input->post('id_spp');
    $data = $this->model->data_spp($spp);
    echo json_encode($data);
  }

  public function tambah()
  {

    $this->form_validation->set_rules('tgl_bayar', 'tanggal Bayar', 'trim|required');
    $this->form_validation->set_rules('bln_bayar', 'Bulan Bayar', 'trim|required');
    $this->form_validation->set_rules('tahun', 'Tahun Bayar', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'required');
    if ($this->form_validation->run() == TRUE) {
      $this->model->insert();
      redirect('pembayaran', 'refresh');
    } else {
      $data = array(
        'siswa' => $this->model->getsiswa(),
        'petugas' => $this->model->getpetugas(),
        'spp' => $this->model->getspp()
      );
      $this->load->view('layouts/header');
      $this->load->view('pembayaran/tambah', $data);
      $this->load->view('layouts/footer');
    }
  }

  public function hapus($id)
  {
    $this->model->delete($id);
    redirect('pembayaran', 'refresh');
  }
}

/* End of file Pembayaran.php */
