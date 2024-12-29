<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_m extends CI_Model {

    public static $pk = 'idnilai';

    public static $table = 'nilai';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getData($idtahun_akademik,$semester)
    {
        return $this->db->select('*')
        ->where('idtahun_akademik',$idtahun_akademik)
        ->where('semester',$semester)
        ->get(self::$table)->result();
    }
    public function getDataWali($idtahun_akademik,$semester,$idkelas)
    {
        // $idguru = $this->db->select('idguru')
        // ->get('wali_kelas')
        return $this->db->select('x4.nip,x4.nama')
        ->join('tahun_akademik x1', 'x1.idtahun_akademik = x.idtahun_akademik', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('guru x4', 'x4.idguru = x.idguru', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas])
        ->get('wali_kelas x')->row_array();
    }
    public function getDataRaport($idtahun_akademik,$semester,$idkelas,$idsiswa)
    {
        // $idtahun_akademik = 5;
        // $semester = "Ganjil";
        // $idkelas = 1;
        // $idsiswa = 16;

        // Menyusun query dengan lebih terstruktur dan deskriptif
        $query = $this->db->select([
                'nilai.semester',
                'siswa.nis',
                'siswa.nama',
                'kelas.kelas_kd',
                'kelas.kelas_nama',
                'tahun_akademik.tahun_akademik',
                'tahun_akademik.tempat',
                'tahun_akademik.tanggal',
            ])
            ->from('nilai')
            ->join('tahun_akademik', 'tahun_akademik.idtahun_akademik = nilai.idtahun_akademik', 'left')
            ->join('kelas', 'kelas.idkelas = nilai.idkelas', 'left')
            ->join('siswa', 'siswa.idsiswa = nilai.idsiswa', 'left')
            ->where([
                'nilai.idtahun_akademik' => $idtahun_akademik,
                'nilai.semester' => $semester,
                'nilai.idkelas' => $idkelas,
                'nilai.idsiswa' => $idsiswa
            ])
            ->group_by('nilai.idsiswa')
            ->get();

        // Cek jika query mengembalikan hasil
        if ($query->num_rows() > 0) {
            // Menggunakan row_array() untuk mendapatkan satu hasil sebagai array asosiatif
            return $query->row_array();
        } else {
            // Jika tidak ada data ditemukan, kembalikan array kosong atau null sesuai kebutuhan
            return [];
        }
    }
    public function getDataNilai($idtahun_akademik,$semester,$idkelas,$idsiswa)
    {
        return $this->db->select('x.*, x1.mapel_nama, kitab.name AS kitab_name')
        ->join('mapel x1', 'x1.idmapel = x.idmapel', 'left')
        ->join('kitab', 'kitab.id_mapel = x.idmapel AND kitab.id_tahun_akademik = x.idtahun_akademik', 'left') // Join ke tabel kitab
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas,'x.idsiswa'=>$idsiswa])
        ->get(self::$table.' x')->result_array();
    }
    public function saveSiswa($data)
    {
        $cek = $this->db->get_where(self::$table,$data)->num_rows();
        if($cek==0){
            $this->db->insert(self::$table, $data);
        }
    }
    public function saveNilai($data,$idnilai)
    {
        $this->db->where(self::$pk, $idnilai);
        $this->db->update(self::$table, $data);
    }


    public function getDataWithRanking($idtahun_akademik, $semester, $idkelas)
    {
        // Mengambil semua nilai siswa dan menghitung total nilai untuk masing-masing siswa
        $this->db->select('x.idsiswa, x1.nama, SUM(x.nilai_akhir) AS total_nilai, RANK() OVER (ORDER BY SUM(x.nilai_akhir) DESC) AS ranking')
            ->from('nilai x')
            ->join('siswa x1', 'x1.idsiswa = x.idsiswa', 'left')
            ->where([
                'x.idtahun_akademik' => $idtahun_akademik,
                'x.semester' => $semester,
                'x.idkelas' => $idkelas
            ])
            ->group_by('x.idsiswa') // Kelompokkan berdasarkan siswa
            ->order_by('ranking', 'ASC'); // Urutkan berdasarkan ranking
    
        // Menjalankan query dan mengembalikan hasilnya
        return $this->db->get()->result_array();
    }
    


}

/* End of file Nilai_m.php */