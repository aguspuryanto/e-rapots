<script>
function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cetak Leger
    </h1>
    <?php if(__session('access')=='super_user'):?>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Cetak Leger</li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('index.php/leger/cetak');?>" method="post">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tahun Pelajaran<span class="text-red">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="idtahun_akademik">
                                <option value="">-- Pilih Tahun Pelajaran --</option>
                                <?php foreach(list_academic_year() as $row):?>
                                <option value="<?=$row->idtahun_akademik;?>"><?=$row->tahun_akademik;?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Semester<span class="text-red">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="semester" required>
                                <option value="">-- Pilih Semester --</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kelas<span class="text-red">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="idkelas">
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach(list_kelas() as $row):?>
                                <option value="<?=$row->idkelas;?>"><?=$row->kelas_kd.' - '.$row->kelas_nama;?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 text-left" style="padding-top:25px;">
                        <!-- <a href="#" class="btn btn-success btn-flat btn-sm" target="_blank" onclick="submit()"><i
                                class="fa fa-print"></i>
                            Cetak Leger</a> -->
                        <button type="submit" class="btn btn-success btn-flat btn-sm" formtarget="_blank"><i
                                class="fa fa-print"></i> Cetak Leger</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>