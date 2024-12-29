<script>
function submit(x) {
    if (x == 'add') {
        // Reset form untuk tambah
        $('[name="id"]').val("");
        $('[name="name"]').val("");
        $('#modal-add .modal-title').html('Tambah Kitab');
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        $('[name="kitab_kd"]').prop('readonly', false);
    } else {
        $('#modal-add .modal-title').html('Ubah Kitab')
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('[name="kitab_kd"]').prop('readonly', true);

        // Ambil data kitab berdasarkan ID
        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>master/kitab/view', // URL yang mengembalikan data kitab
            dataType: 'json',
            success: function(data) {
                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $('[name="id_mapel"]').val(data.id_mapel);  // Pastikan memilih mata pelajaran yang benar
                $('[name="id_tahun_akademik"]').val(data.id_tahun_akademik);  // Pastikan memilih tahun akademik yang benar
            }
        });
    }
}


function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>master/kitab/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Kitab
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Kitab</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('master/kitab');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th>NAMA KITAB</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>TAHUN AKADEMIK</th>
                        <th width="5">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($kitab as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->id;?>)"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                        <td><?=$row->name;?></td>
                        <!-- Menampilkan Nama Mata Pelajaran -->
                        <td>
                            <?php 
                            // Menampilkan nama mata pelajaran berdasarkan id_mapel
                            foreach ($mapel as $m) {
                                if ($m->idmapel == $row->id_mapel) {
                                    echo $m->mapel_nama;
                                }
                            }
                            ?>
                        </td>
                        <!-- Menampilkan Tahun Akademik -->
                        <td>
                            <?php 
                            // Menampilkan tahun akademik berdasarkan id_tahun_akademik
                            foreach ($tahun_akademik as $ta) {
                                if ($ta->idtahun_akademik == $row->id_tahun_akademik) {
                                    echo $ta->formatted_tahun_akademik;
                                }
                            }
                            ?>
                        </td>
                        <td><a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->id;?>)"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>

            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('master/kitab/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <!-- Input hidden untuk ID -->
                    <input type="hidden" name="id">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nama Kitab<span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Ex: Fiqih" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran<span class="text-red">*</span></label>
                                <select class="form-control" name="id_mapel" required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $m) : ?>
                                        <option value="<?= $m->idmapel ?>"><?= $m->mapel_nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_akademik">Tahun Akademik<span class="text-red">*</span></label>
                                <select class="form-control" name="id_tahun_akademik" required>
                                    <option value="">Pilih Tahun Akademik</option>
                                    <?php foreach ($tahun_akademik as $ta) : ?>
                                        <option value="<?= $ta->idtahun_akademik ?>"><?= $ta->formatted_tahun_akademik ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" id="btn-tambah"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" id="btn-ubah"><i
                            class="fa fa-save"></i>
                        Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal konfirmasi delete -->
<div class="modal fade" id="modal-delete" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-hapus">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body bg-red">
                    <p>Anda yakin ingin menghapus data ini ? </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button class="btn btn-sm btn-danger btn-flat" id="deleted"><i class="fa fa-trash"></i> Iya,
                        Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
