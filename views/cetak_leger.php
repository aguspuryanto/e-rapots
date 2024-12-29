<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
        border: 2px solid #000000; /* Border pada cell */
    }
    </style>
</head>
<body>
    <div class="container">
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
                <tr>
                    <td>1</td>
                    <td></td>
                    <td>Suci Adela</td>
                    <td>70</td>
                    <td>-</td>
                    <td>78</td>
                    <td>90</td>
                    <td>85</td>
                    <td>75</td>
                    <td>82</td>
                    <td>50</td>
                    <td>65</td>
                    <td>-</td>
                    <td>552</td>
                    <td>69</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td>Marsel Ardiansyah</td>
                    <td>50</td>
                    <td>-</td>
                    <td>78</td>
                    <td>90</td>
                    <td>86</td>
                    <td>73</td>
                    <td>85</td>
                    <td>54</td>
                    <td>80</td>
                    <td>-</td>
                    <td>589</td>
                    <td>73.63</td>
                    <td>9</td>
                </tr>
                <!-- Tambahkan data lainnya sesuai tabel -->
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
// window.print();
</script>