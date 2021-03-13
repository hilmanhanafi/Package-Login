<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

  public function getdata()
  {
    $this->db->select('*');
    $this->db->from('pembayaran');
    $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas', 'left');
    $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn', 'left');
    $this->db->join('spp', 'pembayaran.id_spp = spp.id_spp', 'left');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function getpetugas()
  {
    return $this->db->get('petugas')->result_array();
  }

  public function getsiswa()
  {
    return $this->db->get('siswa')->result_array();
  }

  public function getspp()
  {
    return $this->db->get('spp')->result_array();
  }

  public function data_nisn($nisn)
  {
    return $this->db->get_where('siswa', ['nisn' => $nisn])->row_array();
  }

  public function data_spp($spp)
  {
    return $this->db->get_where('spp', ['id_spp' => $spp])->row_array();
  }

  public function get_petugas($petugas)
  {
    return $this->db->get_where('petugas', ['nisn' => $petugas])->row_array();
  }
  public function getbynisn($id)
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
    $this->db->join('spp', 'siswa.id_spp = spp.id_spp', 'left');
    $this->db->where('nisn', $id);
    $query = $this->db->get()->row_array();
    return $query;
  }

  public function insert()
  {
    $data = array(
      'id_petugas' => $this->input->post('petugas'),
      'nisn' => $this->input->post('nisn'),
      'tgl_bayar' => $this->input->post('tgl_bayar'),
      'bulan_bayar' => $this->input->post('bln_bayar'),
      'tahun_bayar' => $this->input->post('tahun_bayar'),
      'id_spp' => $this->input->post('spp'),
      'jumlah_bayar' => $this->input->post('jumlah_bayar'),


    );
    $this->db->insert('pembayaran', $data);
  }

  public function update($id)
  {
    $data = array(
      'nisn' => $this->input->post('nisn'),
      'nis' => $this->input->post('nis'),
      'nama' => $this->input->post('nama'),
      'id_kelas' => $this->input->post('kelas'),
      'alamat' => $this->input->post('alamat'),
      'no_telp' => $this->input->post('no_telp'),
      'id_spp' => $this->input->post('spp'),

    );
    $this->db->where('nisn', $id);
    $this->db->update('siswa', $data);
  }

  public function delete($id)
  {
    return $this->db->delete('pembayaran', ['id_pembayaran' => $id]);
  }
}

/* End of file Pembayaran_model.php */
