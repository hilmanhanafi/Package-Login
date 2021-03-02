<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_siswa extends CI_Controller
{

  public function index()
  {
    $this->load->view('siswa');
  }

  public function dashboard()
  {
    $data['isi'] = $this->get_data();
    $this->load->view('pembayaran/isi', $data);
  }

  public function get_data()
  {
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn', 'left');

    $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas', 'left');

    $this->db->where('pembayaran.nisn', $this->session->userdata('nisn'));
    $query = $this->db->get()->result_array();
    // var_dump($query);
    // exit;
    return $query;
  }

  public function do_login()
  {
    $username = $this->input->post('username', true);
    $password = $this->input->post('password', true);
    $user = $this->db->get_where('siswa', ['username' => $username])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {

        $data = array(
          'username' => $user['username'],
          'nisn' => $user['nisn'],
          'status' => 'login'
        );
        $this->session->set_userdata($data);

        redirect('auth_siswa/dashboard', 'refresh');
      } else {
        echo "<script>alert('Username dan  Password Salah');</script>";

        redirect('auth_siswa', 'refresh');
      }
    } else {
      echo "<script>alert('Username dan  Password tidak terdaftar');</script>";

      redirect('auth', 'refresh');
    }
  }
}

/* End of file Auth_siswa.php */
