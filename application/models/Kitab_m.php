<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kitab_m extends CI_Model {

    // Menentukan primary key dan nama tabel
    public static $pk = 'id';  // Primary key untuk tabel kitab
    public static $table = 'kitab';  // Nama tabel untuk kitab

    public function __construct()
    {
        parent::__construct();
        // Anda bisa menambahkan operasi lainnya jika diperlukan
    }
    
    /**
     * Mengambil data kitab
     * @return Array
     */
    public function getData()
    {
        return $this->db->get(self::$table)->result();  // Mengambil semua data dari tabel kitab
    }

    /**
     * Mendapatkan data kitab berdasarkan ID
     * @param Int $id
     * @return Object
     */
    public function getById($id)
    {
        return $this->db->get_where(self::$table, [self::$pk => $id])->row();  // Mengambil satu data berdasarkan ID
    }

    /**
     * Menyimpan atau mengupdate data kitab
     * @param Array $data
     * @param Int|null $id
     * @return Boolean
     */
    public function save($data, $id = null)
    {
        if ($id) {
            // Jika ID ada, lakukan update
            return $this->db->update(self::$table, $data, [self::$pk => $id]);
        } else {
            // Jika ID tidak ada, lakukan insert
            return $this->db->insert(self::$table, $data);
        }
    }

    /**
     * Menghapus data kitab berdasarkan ID
     * @param Int $id
     * @return Boolean
     */
    public function delete($id)
    {
        return $this->db->delete(self::$table, [self::$pk => $id]);
    }
}

/* End of file Kitab_m.php */
