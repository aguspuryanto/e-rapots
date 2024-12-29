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
    JOIN siswa c ON c.idsiswa = b.idsiswa
    GROUP BY c.nama";
    $query = $this->db->query($sql);
    $data['data'] = $query->result();

    $this->load->view('cetak_leger',$data);
  }

}


/* End of file Leger.php */
/* Location: ./application/controllers/Leger.php */