<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('nilai_m');
    }
    

    public function index()
    {
        $data['report'] = true;
        $data['content'] = 'raport';
        $this->load->view('index',$data);
    }
    public function cetak()
    {
        $catatan_wali = $this->input->post('catatan_wali', true);
        $adab = $this->input->post('adab', true);
        $kedisiplinan = $this->input->post('kedisiplinan', true);
        $kerapian = $this->input->post('kerapian', true);

        // Menyimpan catatan wali kelas ke dalam data untuk dicetak
        $data['catatan_wali'] = $catatan_wali;
        $data['adab'] = $adab;
        $data['kedisiplinan'] = $kedisiplinan;
        $data['kerapian'] = $kerapian;

        $idtahun_akademik = $this->input->post('idtahun_akademik',true);
        $semester = $this->input->post('semester',true);
        $idkelas = $this->input->post('idkelas',true);
        $idsiswa = $this->input->post('idsiswa',true);
        // Ambil data raport
        $data['raport_data'] = $this->nilai_m->getDataRaport($idtahun_akademik, $semester, $idkelas, $idsiswa);

        log_message('debug', 'Data Raport: ' . print_r($data['raport_data'], true));

        $data['raport_wali'] = $this->nilai_m->getDataWali($idtahun_akademik,$semester,$idkelas);

        $data['raport_nilai'] = $this->nilai_m->getDataNilai($idtahun_akademik, $semester, $idkelas, $idsiswa);

        
        $data['ranking'] = $this->nilai_m->getDataWithRanking($idtahun_akademik, $semester, $idkelas);

        log_message('debug', 'Ranking Siswa Dicetak: ' . print_r($data['ranking'], true));


        // Ambil data ranking siswa yang dicetak
        $ranking_siswa_dicetak = array_filter($data['ranking'], function ($siswa) use ($idsiswa) {
            return $siswa['idsiswa'] == $idsiswa;
        });

        // Ambil elemen pertama dari hasil filter secara dinamis
        $ranking_siswa = reset($ranking_siswa_dicetak); // Mengambil elemen pertama

        // Log hasil ranking siswa untuk debugging
        if ($ranking_siswa) {
            log_message('debug', 'Ranking Siswa Dicetak: ' . print_r($ranking_siswa['ranking'], true));

            // Total siswa yang ada
            $total_siswa = count($data['ranking']);

            // Format teks ranking siswa
            $ranking_text = "Ranking {$ranking_siswa['ranking']} dari {$total_siswa} santri";

            // Kirimkan data ke view
            $data['rangking_value'] = $ranking_siswa['ranking'];
            $data['ranking_siswa'] = $ranking_text;
            $data['total_siswa'] = $total_siswa;

            // Debug log untuk memastikan data tersedia
            log_message('debug', 'Ranking Siswa Text: ' . $ranking_text);
        } else {
            // Jika siswa tidak ditemukan, berikan pesan error
            $data['ranking_siswa'] = "Data siswa dengan ID $idsiswa tidak ditemukan.";
            $data['total_siswa'] = 0;

            // Debug log untuk error
            log_message('error', "Data siswa dengan ID $idsiswa tidak ditemukan.");
        }

        // Load view dengan data
        $this->load->view('cetak_raport', $data);
    }
    public function siswa()
    {
        $data['report_siswa'] = true;
        $data['content'] = 'raport_siswa';
        $this->load->view('index',$data);
    }
    public function cetak_siswa($nis)
    {
        $idtahun_akademik = $this->input->post('idtahun_akademik',true);
        $semester = $this->input->post('semester',true);
        $row = $this->db->select('x.idkelas,x1.idsiswa')
        ->join('rombel x1', 'x1.idwali_kelas = x.idwali_kelas', 'left')
        ->join('siswa x2', 'x2.idsiswa = x1.idsiswa', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x2.nis'=>$nis])
        ->get('wali_kelas x')->row();
        if($row==null){
            redirect('raport/siswa','refresh');
        }
        $idkelas = $row->idkelas;
        $idsiswa = $row->idsiswa;
        $data['raport_data'] = $this->nilai_m->getDataRaport($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $data['raport_wali'] = $this->nilai_m->getDataWali($idtahun_akademik,$semester,$idkelas);
        $data['raport_nilai'] = $this->nilai_m->getDataNilai($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $this->load->view('cetak_raport',$data);
    }

}

/* End of file Raport.php */