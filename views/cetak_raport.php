<?php
error_reporting(0);
?>
<html>

<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

    <script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <title>Cetak Raport</title>

    <!-- Aturan CSS untuk Times New Roman -->
    <style>
        body, table, h1, h2, h3, h4, h5, h6, p, td, th {
            font-family: "Times New Roman", Times, serif !important;
        }

    table {
        font-size: 9pt; /* Ukuran font kecil */
        border-collapse: collapse; /* Menghilangkan jarak antar border */
        padding: 0 px;

      
       
    }

    td, th {
        padding: 0px; /* Padding minimal untuk ukuran cell yang konsisten */
       
      
    }

    .table-bordered {
        border: 1px solid #000000; /* Menambahkan border untuk tabel */
    }

    .table-bordered td, .table-bordered th {
        border: 2px solid #000000; /* Border pada cell */
    }
    </style>
</head>

<body>
    <?php
        // Contoh perhitungan jumlah dan rata-rata nilai
        if($raport_nilai) {
            $jumlah_nilai = array_sum(array_column($raport_nilai, 'nilai_akhir'));
        $rata_rata_nilai = $jumlah_nilai / count($raport_nilai);
        }

    ?>

    <div style="page-break-after:always;">
    <div style="margin-top: 20px; display: flex; justify-content: center; align-items: center; width: 100%;"> 

        <!-- Kolom Logo Kiri -->
        <div style="flex: 0 0 auto; padding-right: 5px; margin-left: 20px;">
            <img src="<?= base_url('uploads/') . _school_profile()->logo; ?>" alt="Logo Sekolah" style="width:100px; height:100px; margin-bottom:10px;">
        </div>

        <!-- Kolom Teks Tengah -->
        <div style="flex: 1; text-align: center; margin-right: 50px;">
        <h3 style="line-height:5px; font-size:36px; margin-bottom: 30px;">
    <b><?= _convert_to_arabic(_school_profile()->nama); ?> </b>
</h3>


            <h3 style="line-height:5px;">
                <b><?= _school_profile()->nama; ?></b>
            </h3>
            <h2 style="line-height:5px;  margin-bottom: 30px;">
                <b>MADRASAH DINIYAH NURUL ISLAM</b>
            </h2>

            <!-- <h3 style="line-height:5px;">Akreditasi <?= _school_profile()->akreditasi; ?></h3> -->
            
        </div>

        <!-- Kolom Kosong Kanan -->
        <div style="flex: 0 0 auto;"></div>

    </div>

            <p style="line-height:5px;margin-top:-5px; text-align: center;">
                <?= _school_profile()->alamat; ?> RT
                <?= _school_profile()->rt; ?> / RW
                <?= _school_profile()->rw; ?>
                <?= _school_profile()->dusun; ?>, Kel. <?= _school_profile()->kelurahan; ?>, <?= _school_profile()->kecamatan; ?>,
                <?= _school_profile()->kabupaten; ?> - <?= _school_profile()->provinsi; ?>
            </p>
    

            <hr style="border:1px solid;margin-right:0px;margin-top:-5px;width:100%;">


        <h4 class="text-center"><b>LAPORAN HASIL SEMESTER</b></h4>
        <!-- <h4 class="text-center">RAPORT SISWA</h4> -->
        <br>
        <table style="padding:15px;">
            <tr>
                <td width="150"><b>NIS</b></td>
                <td width="20">:</td>
                <td width="350"><b><?=$raport_data['nis'];?></b></td>
                <td width="150"><b>Tahun Ajaran</b></td>
                <td width="20">:</td>
                <td  width="150"><b><?=$raport_data['tahun_akademik'];?></b></td>
            </tr>
            <tr>
                <td width="150"><b>Nama Siswa</b></td>
                <td width="20">:</td>
                <td width="350"><b><?=$raport_data['nama'];?></b></td>
                <td width="125"><b>Semester</b></td>
                <td width="20">:</td>
                <td><b><?=$raport_data['semester'];?></b></td>
            </tr>
            <tr>
                <td width="150"><b>Kelas</b></td>
                <td width="20">:</td>
                <td width="350"><b><?=$raport_data['kelas_kd'].' - '.$raport_data['kelas_nama'] . ' / ' . numberToArabicWords($raport_data['kelas_kd']);?></b></td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">No</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">Mata Pelajaran</th>
                    <th colspan="4" style="text-align:center;padding:0px;">Hasil Belajar</th>
                    <th style="text-align:center;padding:0px;line-height:30px;" rowspan="2">Kitab/ الكيتاب</th>
                    <!-- <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">Nilai Akhir</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">PREDIKAT</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">KETERANGAN</th> -->
                    <!-- Kolom Baru yang Ditambahkan -->

                    <th colspan="4" style="text-align:center;padding:0px;">هاسيل بيلاجار</th>

                    
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">مادة</th> <!-- Mata Pelajaran (Bahasa Arab) -->
                    
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">رقم</th> <!-- No (Bahasa Arab) -->
                </tr>
                <tr>
                    <th style="text-align:center;line-height:30px;padding:0px;" colspan="2">Angka</th>
                    <th style="text-align:center;line-height:30px;padding:0px;" colspan="2">Terbilang</th>



                    <th style="text-align:center;line-height:30px;padding:0px;" colspan="2">تيربيلانج</th>
                    <th style="text-align:center;line-height:30px;padding:0px;" colspan="2">أنجكا</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($raport_nilai as $row) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td> <!-- No -->
                    <td><?= $row['mapel_nama']; ?></td> <!-- Mata Pelajaran -->
                    <td class="text-center" colspan="2"><?= $row['nilai_akhir']; ?></td>
                    <td class="text-center" colspan="2"><?= ucfirst(terbilang($row['nilai_akhir'])); ?></td>

                    <td class="text-center"><?= $row['kitab_name']; ?></td>

                    <td class="text-center" colspan="2"><?= terbilang_arab($row['nilai_akhir']); ?></td>
                    <td class="text-center" colspan="2"><?= numberToArabicDigits($row['nilai_akhir']); ?></td>

                    
                    <!-- Data untuk Kolom Bahasa Arab -->
                    
                    <td><?= _convert_to_arabic($row['mapel_nama']); ?></td> <!-- Mata Pelajaran (Bahasa Arab) -->

                    <td class="text-center"><?= numberToArabicDigits($no - 1); ?></td> <!-- No (Bahasa Arab) -->
                </tr>
                <?php endforeach; ?>
                
                <tr><td></td>
                    <td>Jumlah</td>
                    <td colspan="4" class="text-center" colspan="2"><?= $jumlah_nilai; ?></td>
                    <td></td>
                    <td colspan="4" class="text-center"><?= numberToArabicDigits($jumlah_nilai); ?></td>
                    <td>الجملة</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Rata-rata</td>
                    <td colspan="4" class="text-center" colspan="2"><?= $rata_rata_nilai; ?></td>
                    <td></td>
                    <td colspan="4" class="text-center"><?= numberToArabicDigits($rata_rata_nilai); ?></td>
                    <td>متوسط</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Peringkat</td>
                    <td colspan="4" class="text-center" colspan="2"><?= $ranking_siswa; ?></td>
                    <td></td>
                    <td colspan="4" class="text-center"><?= numberToArabicDigits($rangking_value); ?> من  <?= numberToArabicDigits($total_siswa); ?> طلاب</td>
                    <td>المرتبة</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;" colspan="3">Kepribadian</th>
                    <th style="text-align: center;" rowspan="3">Catatan Wali Kelas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>Adab dan Akhlaq</td>
                    <td style="text-align: center;"><?= $adab; ?></td>
                    <td><?= konversiNilaiHuruf($adab); ?></td>
                    <td rowspan="3"><?= nl2br($catatan_wali); ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Kedisiplinan</td>
                    <td style="text-align: center;"><?= $kedisiplinan; ?></td>
                    <td><?= konversiNilaiHuruf($kedisiplinan); ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td>Kerapian</td>
                    <td style="text-align: center;"><?= $kerapian; ?></td>
                    <td><?= konversiNilaiHuruf($kerapian); ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tr>
                <td style="width: 70%;" rowspan="2">
                    <strong>Keputusan:</strong><br>
                    Berdasarkan pertimbangan dan ketentuan hasil belajar, peserta didik dinyatakan: <br>
                    <strong>Naik Kelas / Tinggal Kelas</strong> dan siap mengikuti tahapan pembelajaran selanjutnya.
                </td>
                <td style="text-align: center;">
                <?php
        // Mengatur locale ke Indonesia
        setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'ind');
        echo strftime("%d %B %Y", strtotime($raport_data['tanggal']));
        ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                <?php
                // Mendapatkan tanggal, bulan, dan tahun
                $tanggal = date('d', strtotime($raport_data['tanggal']));
                $bulan = date('M', strtotime($raport_data['tanggal']));
                $tahun = date('Y', strtotime($raport_data['tanggal']));

                // Menampilkan tanggal, bulan, dan tahun secara terpisah
                echo numberToArabicDigits($tanggal) . ' ' . _convert_to_arabic($bulan) . ' ' . numberToArabicDigits($tahun);
                ?>
                </td>
            </tr>
        </table>



        <!-- <p>
            Keterangan :
            <br>
            <b>RTP</b> : Rata-rata nilai Tugas/PR
            <br>
            <b>RNU</b> : Rata-rata nilau Ulangan Harian
            <br>
            <b>PTS</b> : Penilaian Tengah Semester
            <br>
            <b>UAS</b> : Ujian Akhir Semester
        </p> -->
        <table>
            <tr>
                <td class="text-center" width="500">
                    Wali Santri
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u>(..........................................)</u> <!-- Tempat untuk Wali Santri -->
                    <br>
                </td>

                <td class="text-center" width="500">
                    Wali Kelas
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?=$raport_wali['nama'];?></u>
                    <br>
                    NIP. <?=$raport_wali['nip'];?>
                </td>

                <td class="text-center" width="500">
                    Kepala Madin
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?=_school_profile()->nama_kepsek;?></u>
                    <br>
                    NIP. <?=_school_profile()->nip_kepsek;?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>
