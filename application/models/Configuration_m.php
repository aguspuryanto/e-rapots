<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration_m extends CI_Model {

    public static $pk = 'idtahun_akademik';
    public static $table = 'tahun_akademik';

    public function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        // Mengambil data tahun akademik dan semester
    $query = $this->db->order_by('idtahun_akademik', 'desc')->get(self::$table);
    
    // Menggabungkan tahun akademik dan semester menjadi satu string
    $result = $query->result(); // Mendapatkan hasil query
    
    // Menyimpan hasil yang sudah diformat dalam array baru
    $formatted_result = [];
    foreach ($result as $row) {
        // Gabungkan tahun akademik dan semester
        $row->formatted_tahun_akademik = $row->tahun_akademik . ' ' . $row->semester;
        
        // Menambahkan hasil yang sudah diformat ke array baru
        $formatted_result[] = $row;
    }

    // Debugging: Menampilkan hasil yang diformat
    // echo '<pre>';
    // print_r($formatted_result);
    // echo '</pre>';

    return $formatted_result;  // Mengembalikan data yang sudah diformat
    }

    public function getDataById($id)
    {
        return $this->db->get_where(self::$table, [$this->pk => $id])->row();
    }

    public function addNew($data)
    {
        $this->db->insert(self::$table, $data);
    }

    public function update($id, $table, $data)
    {
        $this->db->where('idtahun_akademik', $id);
        $this->db->update($table, $data);
    }

    public function deactivate_academic_years($id = 0, $field = 'semester_aktif') {
        if ($id > 0) $this->db->where(self::$pk . ' !=', $id);
        return $this->db->update(self::$table, [$field => 0]);
    }
}
