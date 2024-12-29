<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitab extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged_in();  // Pastikan user sudah login
        $this->load->model('Kitab_m');  // Memuat model Kitab_m
        $this->load->model('Mapel_m');  // Memuat model Mapel_m
        $this->load->model('Configuration_m');  // Memuat model Configuration_m
        $this->pk = kitab_m::$pk;   // Primary key untuk tabel kitab
        $this->table = kitab_m::$table;   // Nama tabel untuk kitab
    }

    // Menampilkan daftar kitab
    public function index() {

        $data['master'] = $data['kitab'] = true;  // Menandakan menu aktif
        $data['kitab'] = $this->Kitab_m->getData();  // Mengambil data kitab
        $data['mapel'] = $this->Mapel_m->getData();  // Mengambil data mata pelajaran
        $data['tahun_akademik'] = $this->Configuration_m->getData();  // Mengambil data tahun akademik yang sudah diformat
        $data['content'] = 'master/kitab';  // Nama file view
        $this->load->view('index', $data);  // Menampilkan halaman
    }

    /**
     * Save | Update Kitab
     */
    public function save() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $id_mapel = $this->input->post('id_mapel');
        $id_tahun_akademik = $this->input->post('id_tahun_akademik');
    
        // Data yang akan disimpan atau diupdate
        $data = array(
            'name' => $name,
            'id_mapel' => $id_mapel,
            'id_tahun_akademik' => $id_tahun_akademik
        );

        // Log data yang diterima
    log_message('debug', 'Data yang diterima: ' . print_r($data, true));


    
        // Jika ID kosong, berarti add, jika ada ID berarti update
        if ($id == "") {
            $this->db->insert('kitab', $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update('kitab', $data);
        }
    
        // Redirect setelah simpan atau update
        redirect('master/kitab');
    }

    /**
     * Dataset untuk menyimpan data kitab
     * @return Array
     */
    private function dataset() {
        return [
            'name' => $this->input->post('name', true),
            'id_mapel' => $this->input->post('id_mapel', true),
            'id_tahun_akademik' => $this->input->post('id_tahun_akademik', true),
        ];
    }

    /**
     * View kitab berdasarkan ID
     * @return JSON
     */
    public function view() {
        $id = $this->input->post('id', true);
        $data = $this->db->get_where($this->table, [$this->pk => $id])->row();
        echo json_encode($data);  // Mengirimkan data kitab dalam format JSON
    }

    /**
     * Hapus kitab berdasarkan ID
     * @return Array
     */
    public function delete($id) {
        $delete = $this->db->delete($this->table, [$this->pk => $id]) ? 'success' : 'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/kitab');
    }
}
