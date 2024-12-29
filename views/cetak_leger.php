<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

    <script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <title>Tabel Bootstrap</title>

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
        border: 1px solid #000000; /* Border pada cell */
    }

    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
        border: 1px solid #000000; /* Border pada cell di dalam tabel**/
    }
    
    @page {
        size: 25cm 35.7cm;
        margin: 5mm 0mm 0mm 5mm; /* change the margins as you want them to be. */
    }
    </style>
</head>
<body>
    <div class="xcontainer">

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

        <h2 class="text-center">Leger Madrasah Diniyah Nurul Islam Kelas</h2>
        <p class="text-center">Semester GANJIL Tahun Pelajaran 2024/2025</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">NIS</th>
                    <th rowspan="2">Nama</th>
                    <th>Al-Quran</th>
                    <th>Al-Quran Tafsir</th>
                    <th>Ilmu Hadits</th>
                    <th>Tauhid</th>
                    <th>Adab Akhlak</th>
                    <th>Fiqih</th>
                    <th>Sejarah Islam</th>
                    <th>Nahwu Sharaf</th>
                    <th>Ibadah</th>
                    <th>Imlak</th>
                    <th rowspan="2">Jumlah</th>
                    <th rowspan="2">Rata</th>
                    <th rowspan="2">Rank</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Ibadah Amaliyah 2</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- loop data di sini -->
                <?php $i=1; foreach($data as $row):?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?=$row->nis;?></td>
                    <td><?=$row->nama;?></td>
                    <td><?=$row->al_quran;?></td>
                    <td><?=$row->tafsir;?></td>
                    <td><?=$row->hadits;?></td>
                    <td><?=$row->tauhid;?></td>
                    <td><?=$row->akhlak;?></td>
                    <td><?=$row->fiqih;?></td>
                    <td><?=$row->sejarah;?></td>
                    <td><?=$row->nahwu;?></td>
                    <td><?=$row->ibadah;?></td>
                    <td><?=$row->imlak;?></td>
                    <td><?=$row->jumlah;?></td>
                    <td><?=$row->rata_rata;?></td>
                    <td><?=$row->peringkat;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
window.print();
</script>