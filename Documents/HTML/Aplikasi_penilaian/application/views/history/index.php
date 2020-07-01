 <style>
        .text-center
        {
            text-align: center !mportant;
        }
</style>

<div class="page-header">
    <h1>Halaman History</h1>
</div>
<div class="col-lg-12">
    <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="panel panel-primary">

            <div class="panel-heading">List History</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="text-center" rowspan="2">No</th>
                            <th class="text-center" rowspan="2">Nama Penyedia</th>
							<th class="text-center" colspan="5"><cennter>Kode Kriteria</center></th>
							<th class="text-center" rowspan="2">Nilai</th>
                        </tr>
                        <tr>
                            <th>Materi</th>
                            <th>Fasilitator</th>
                            <th>Dipahami</th>
                            <th>Sikap</th>
                            <th>Penampilan</th>
                        </tr>
                        </thead> 
                        <tbody>  

                        <?php
                            $no = 1;
                            foreach ($history as $item) {
                        ?>
                            <tr>

                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->pelatihan ?></td>
                                
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>Nilai</td>

                            </tr>
                        <?php
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <a href="<?php echo site_url('pelatihan/tambah') ?>" type="button" class="btn btn-primary">Tambah
                Pelatihan</a>
        </div>
        <div class="form-group">
            <a href="<?php echo site_url('pelatihan/tambah_nilai') ?>" type="button" class="btn btn-primary">Tambah
                Penilaian</a>
        </div>
    </div>
	

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi hapus data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger"
                        onclick="hapus_pelatihan(<?php echo $item->kdPelatihan; ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="form_pelatihan" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ubah Pelatihan Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="formPelatihan" class="form-horizontal">
                    <div id="errors">

                    </div>
                    `
                    <div class="form-body">
                        <input name="kdPelatihan" placeholder="Kode Pelatihan" class="form-control" type="hidden">

                        <div class="form-group">
                            <label class="control-label col-md-3">Pelatihan</label>
                            <div class="col-md-9">
                                <input name="pelatihan" placeholder="Pelatihan" class="form-control" type="text">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                            </div>
                        </div>
						
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Telp</label>
                            <div class="col-md-9">
                                <input name="telp" placeholder="telp" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_pelatihan()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>