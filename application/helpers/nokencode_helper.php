<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
* get __session
* @param String $session_key
* @return Any
*/
if ( ! function_exists('__session')) {
	function __session( $session_key ) {
		$CI = &get_instance();
		return $CI->session->userdata( $session_key );
	}
}
/**
* get _active_years
* @return Any
*/
if ( ! function_exists('_active_years')) {
	function _active_years() {
		$CI = &get_instance();
		return $CI->db->get_where('tahun_akademik',['semester_aktif'=>1])->row();
	}
}
/**
* get _school_profile
* @return Any
*/
if ( ! function_exists('_school_profile')) {
	function _school_profile() {
		$CI = &get_instance();
		return $CI->db->get('profil_sekolah')->row();
	}
}

    function _convert_to_arabic($text) {
        // Menggunakan GoogleTranslate untuk menerjemahkan teks ke bahasa Arab
        // try {
        //     // Menggunakan Google Translate API untuk menerjemahkan
        //     $CI = &get_instance();
        //     $translator = new Stichoza\GoogleTranslate\GoogleTranslate('ar'); // 'ar' untuk bahasa Arab
        //     return $translator->translate($text);
        // } catch (Exception $e) {
		// 	log_message('error', 'Google Translate Error: ' . $e->getMessage());
        //     return "Error: " . $e->getMessage(); // Menampilkan error jika gagal
        // }
		return $text;
    }

	function numberToArabicWords($number) {
		$units = ["", "واحد", "اثنان", "ثلاثة", "أربعة", "خمسة", "ستة", "سبعة", "ثمانية", "تسعة"];
		$teens = ["عشرة", "أحد عشر", "إثنا عشر", "ثلاثة عشر", "أربعة عشر", "خمسة عشر", "ستة عشر", "سبعة عشر", "ثمانية عشر", "تسعة عشر"];
		$tens = ["", "", "عشرون", "ثلاثون", "أربعون", "خمسون", "ستون", "سبعون", "ثمانون", "تسعون"];
		$hundreds = ["", "مائة", "مئتان", "ثلاثمائة", "أربعمائة", "خمسمائة", "ستمائة", "سبعمائة", "ثمانمائة", "تسعمائة"];
	
		if ($number == 0) {
			return "صفر";
		}
	
		$words = "";
	
		if ($number >= 100) {
			$hundred = intdiv($number, 100);
			$words .= $hundreds[$hundred] . " ";
			$number %= 100;
		}
	
		if ($number >= 20) {
			$ten = intdiv($number, 10);
			$words .= $tens[$ten] . " ";
			$number %= 10;
		}
	
		if ($number >= 10) {
			$words .= $teens[$number - 10] . " ";
		} else {
			$words .= $units[$number] . " ";
		}
	
		return trim($words);
	}

	function numberToArabicDigits($number) {
		$arabicDigits = [
			"0" => "٠",
			"1" => "١",
			"2" => "٢",
			"3" => "٣",
			"4" => "٤",
			"5" => "٥",
			"6" => "٦",
			"7" => "٧",
			"8" => "٨",
			"9" => "٩"
		];
	
		// Ubah angka Latin ke string
		$numberStr = strval($number);
		
		// Gantikan setiap digit dengan angka Arab
		$arabicNumber = '';
		for ($i = 0; $i < strlen($numberStr); $i++) {
			$arabicNumber .= $arabicDigits[$numberStr[$i]] ?? $numberStr[$i];
		}
	
		return $arabicNumber;
	}

    function terbilang($number) {
        $angka = [
            '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 
            'sepuluh', 'sebelas'
        ];
        
        if ($number < 12) {
            return $angka[$number];
        } elseif ($number < 20) {
            return terbilang($number - 10) . ' belas';
        } elseif ($number < 100) {
            return terbilang($number / 10) . ' puluh ' . terbilang($number % 10);
        } elseif ($number < 200) {
            return 'seratus ' . terbilang($number - 100);
        } elseif ($number < 1000) {
            return terbilang($number / 100) . ' ratus ' . terbilang($number % 100);
        } elseif ($number < 2000) {
            return 'seribu ' . terbilang($number - 1000);
        } elseif ($number < 1000000) {
            return terbilang($number / 1000) . ' ribu ' . terbilang($number % 1000);
        } elseif ($number < 1000000000) {
            return terbilang($number / 1000000) . ' juta ' . terbilang($number % 1000000);
        }
        return $number;
    }

	function terbilang_arab($number) {
		$angka = [
			'', 'واحد', 'اثنان', 'ثلاثة', 'أربعة', 'خمسة', 'ستة', 'سبعة', 'ثمانية', 'تسعة',
			'عشرة', 'أحد عشر', 'اثنا عشر'
		];
	
		if ($number < 12) {
			return $angka[$number];
		} elseif ($number < 20) {
			return $angka[$number - 10] . ' عشر';
		} elseif ($number < 100) {
			return $angka[intval($number / 10)] . 'ون ' . terbilang_arab($number % 10);
		} elseif ($number < 200) {
			return 'مائة ' . terbilang_arab($number - 100);
		} elseif ($number < 1000) {
			return $angka[intval($number / 100)] . ' مائة ' . terbilang_arab($number % 100);
		} elseif ($number < 2000) {
			return 'ألف ' . terbilang_arab($number - 1000);
		} elseif ($number < 1000000) {
			return terbilang_arab(intval($number / 1000)) . ' ألف ' . terbilang_arab($number % 1000);
		} elseif ($number < 1000000000) {
			return terbilang_arab(intval($number / 1000000)) . ' مليون ' . terbilang_arab($number % 1000000);
		}
		return $number;
	}

function konversiNilaiHuruf($nilai) {
    // Array konversi nilai
    $konversi_nilai = [
        'A' => 'Sangat Baik',
        'B' => 'Baik',
        'C' => 'Cukup',
        'D' => 'Kurang',
        'E' => 'Sangat Kurang'
    ];

    // Mengembalikan deskripsi berdasarkan nilai huruf
    return isset($konversi_nilai[$nilai]) ? $konversi_nilai[$nilai] : 'Tidak Diketahui';
}
	




/**
* Data Mapel By Guru
* @param String
* @return Object
*/
if (!function_exists('mapel_by_guru')){
	function mapel_by_guru($tahun_akademik,$semester,$idguru)
	{
		$CI =& get_instance();
		return $CI->db->join('kelas k', 'k.idkelas = n.idkelas', 'left')
		->join('mapel m', 'm.idmapel = n.idmapel', 'left')
		->where(['n.idtahun_akademik'=>$tahun_akademik,'n.semester'=>$semester,'n.idguru'=>$idguru])
		->get('mengajar n')->result();
        
	}
}
/**
* List Mapel By Guru
* @param String
* @return Object
*/
if (!function_exists('list_mapel_by_guru')){
	function list_mapel_by_guru($tahun_akademik,$semester,$nip)
	{
		$CI =& get_instance();
		$guru = $CI->db->select('idguru')
		->where('nip',$nip)
		->get('guru')->row();
		$idguru = $guru->idguru;
		return $CI->db->join('kelas k', 'k.idkelas = n.idkelas', 'left')
		->join('mapel m', 'm.idmapel = n.idmapel', 'left')
		->where(['n.idtahun_akademik'=>$tahun_akademik,'n.semester'=>$semester,'n.idguru'=>$idguru])
		->get('mengajar n')->result();
        
	}
}
/**
* Data Siswa By Kelas
* @param String
* @return Object
*/
if (!function_exists('siswa_by_kelas')){
	function siswa_by_kelas($tahun_akademik,$semester,$idkelas)
	{
		$CI =& get_instance();
		return $CI->db->select('x1.idtahun_akademik,x1.semester,x2.idsiswa,x2.nis,x2.nama')
		->join('wali_kelas x1', 'x1.idwali_kelas = x.idwali_kelas', 'left')
		->join('siswa x2', 'x2.idsiswa = x.idsiswa', 'left')
		->join('kelas x3', 'x3.idkelas = x1.idkelas', 'left')
		->where(['x1.idtahun_akademik'=>$tahun_akademik,'x1.semester'=>$semester,'x1.idkelas'=>$idkelas,'x2.status'=>'Aktif'])
		->get('rombel x')->result();
        
	}
}
/**
* Data Nilai By Siswa
* @param String
* @return Object
*/
if (!function_exists('nilai_by_siswa')){
	function nilai_by_siswa($tahun_akademik,$semester,$idkelas,$idmapel,$idsiswa)
	{
		$CI =& get_instance();
		return $CI->db->select('*')
		->where(['x.idtahun_akademik'=>$tahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas,'x.idmapel'=>$idmapel,'x.idsiswa'=>$idsiswa])
		->get('nilai x')->result();
        
	}
}
/**
* Tahun Akademik
* @param String
* @return Object
*/
if (!function_exists('list_academic_year')){
	function list_academic_year(){
		$CI =& get_instance();
		$CI->db->order_by('idtahun_akademik', 'desc');
		return $CI->db->get('tahun_akademik')->result();
	}
}
/**
* Siswa
* @param String
* @return Object
*/
if (!function_exists('list_siswa')){
	function list_siswa(){
		$CI =& get_instance();
		return $CI->db->get_where('siswa',['status'=>'Aktif'])->result();
	}
}
/**
* Guru
* @param String
* @return Object
*/
if (!function_exists('list_guru')){
	function list_guru(){
		$CI =& get_instance();
		return $CI->db->get('guru')->result();
	}
}
/**
* Mata Pelajaran
* @param String
* @return Object
*/
if (!function_exists('list_mapel')){
	function list_mapel(){
		$CI =& get_instance();
		return $CI->db->get('mapel')->result();
	}
}
/**
* Kelas
* @param String
* @return Object
*/
if (!function_exists('list_kelas')){
	function list_kelas(){
		$CI =& get_instance();
		return $CI->db->get('kelas')->result();
	}
}
/**
* Pengguna
* @param String
* @return Object
*/
if (!function_exists('list_pengguna')){
	function list_pengguna(){
		$CI =& get_instance();
		return $CI->db->get('users')->result();
	}
}
/**
* Jumlah Siswa
* @param String
* @return Object
*/
if (!function_exists('count_rombel')){
	function count_rombel($id){
		$CI =& get_instance();
		return count($CI->db->get_where('rombel',['idwali_kelas'=>$id])->result());
	}
}
/**
* Chechk User
* @param String
* @return Array
*/
if (!function_exists('chechk_user')){
	function check_user($user){
		$CI =& get_instance();
		return $CI->db->get_where('users',['user_name'=>$user])->num_rows();
	}
}
/**
* User
* @param String
* @return Array
*/
if (!function_exists('user')){
	function user($id){
		$CI =& get_instance();
		return $CI->db->get_where('users',['idusers'=>$id])->row();
	}
}
/**
* Session login 
* @param String
* @return Boolean
*/
function is_logged_in()
{
	$ci =& get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	}else{
		$access = $ci->session->userdata('access');
	}
}
/**
* Is a Natural number, but not a zero  (1,2,3, etc.)
* @param String $n
* @return Boolean
*/
if ( ! function_exists('_isNaturalNumber')) {
	function _isNaturalNumber( $n ) {
		return ($n != 0 && ctype_digit((string) $n));
	}
}

/**
* Is Integer
* @param String $n
* @return Boolean
*/
if ( ! function_exists('_toInteger')) {
	function _toInteger( $n ) {
		$n = abs(intval(strval($n)));
		return $n;
	}
}