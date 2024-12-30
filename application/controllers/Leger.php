<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Leger
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Leger extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('kelas_m');
    $this->load->model('mapel_m');
  }

  public function index()
  {
    $data['report'] = true;
    $data['content'] = 'leger';
    $this->load->view('index',$data);
  }

  public function cetak()
  {
    $data['report'] = true;
    // $data['content'] = 'cetak_leger';
    $post = $this->input->post();
    // echo json_encode($post);
    $idtahun_akademik = $post['idtahun_akademik'];
    $semester         = $post['semester'];
    $idkelas          = $post['idkelas'];

    $data['idtahun_akademik']  = $idtahun_akademik;
    $data['semester']           = $semester;
    $data['idkelas']            = $idkelas;

    if($idtahun_akademik) {
      $data['tahun']    = $this->db->get_where('tahun_akademik', ['idtahun_akademik' => $idtahun_akademik])->row();
    }

    $data['semester'] = $semester;
    
    if($idkelas) {
      $data['kelas'] = $this->db->get_where('kelas', ['idkelas' => $idkelas])->row();
    }

    $sqlWhere = '';
    if(isset($post)){
      $sqlWhere = " WHERE b.idtahun_akademik = '$idtahun_akademik' AND b.semester = '$semester' AND b.idkelas = '$idkelas'";
    }

    $sql = "SELECT c.nama, c.nis,
      MAX(CASE WHEN a.idmapel = '6' THEN b.nilai_akhir ELSE 0 END) AS al_quran,
      MAX(CASE WHEN a.idmapel = '7' THEN b.nilai_akhir ELSE 0 END) AS tafsir,
      MAX(CASE WHEN a.idmapel = '8' THEN b.nilai_akhir ELSE 0 END) AS hadist,
      MAX(CASE WHEN a.idmapel = '9' THEN b.nilai_akhir ELSE 0 END) AS tauhid,
      MAX(CASE WHEN a.idmapel = '10' THEN b.nilai_akhir ELSE 0 END) AS akhlak,
      MAX(CASE WHEN a.idmapel = '11' THEN b.nilai_akhir ELSE 0 END) AS fiqih,
      MAX(CASE WHEN a.idmapel = '12' THEN b.nilai_akhir ELSE 0 END) AS sejarah,
      MAX(CASE WHEN a.idmapel = '13' THEN b.nilai_akhir ELSE 0 END) AS nahwu,
      MAX(CASE WHEN a.idmapel = '14' THEN b.nilai_akhir ELSE 0 END) AS ibadah,
      MAX(CASE WHEN a.idmapel = '15' THEN b.nilai_akhir ELSE 0 END) AS imlak,
      SUM(b.nilai_akhir) AS jumlah,
      ROUND(AVG(b.nilai_akhir), 0) AS rata_rata,  -- Membulatkan rata-rata ke 0 desimal,
      RANK() OVER (ORDER BY AVG(b.nilai_akhir) DESC) AS peringkat
    FROM mapel a
    JOIN nilai b ON b.idmapel = a.idmapel
    JOIN siswa c ON c.idsiswa = b.idsiswa $sqlWhere
    GROUP BY c.nama";
    $query = $this->db->query($sql);
    $data['data'] = $query->result();
    $data['mapel'] = $this->mapel_m->getData();
    $data['controller'] = $this;
    // echo json_encode($data);

    $this->load->view('cetak_leger',$data);
  }

  public function getKitab($idmapel, $idtahun_akademik) {
    $query = $this->db->get_where('kitab', ['id_mapel' => $idmapel, 'id_tahun_akademik' => $idtahun_akademik])->row();
    return $query;
  }

}


/* End of file Leger.php */
/* Location: ./application/controllers/Leger.php */