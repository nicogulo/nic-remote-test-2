<div class="page-header">
    <h1>Tambah Pelatihan</h1>
</div>
<div class="col-md-10">
    <?php echo form_open() ?>
    <div class="row">
        <div class="errors">
            <?php
//            
            $errors = $this->session->flashdata('errors');
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="pelatihan">Nama Pelatihan</label>
                        <input name="pelatihan" type="text" class="form-control" id="pelatihan"
                               value="<?php echo isset($nilaiPelatihan[0]->pelatihan) ? $nilaiPelatihan[0]->pelatihan : ''?>"
                               placeholder="nama pelatihan">
                    </div>
                </div>
            </div>
        </div>
		
		
		
		<div class="panel panel-default">
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat"
                               value="<?php echo isset($nilaiPelatihan[0]->alamat) ? $nilaiPelatihan[0]->alamat : ''?>"
                               placeholder="Alamat">
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input name="telp" type="text" class="form-control" id="telp"
                               value="<?php echo isset($nilaiPelatihan[0]->telp) ? $nilaiPelatihan[0]->telp : ''?>"
                               placeholder="Telp">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="telp">bidang</label>
                        <input name="bidang" type="text" class="form-control" id="bidang"
                               value="<?php echo isset($nilaiPelatihan[0]->bidang) ? $nilaiPelatihan[0]->bidang : ''?>"
                               placeholder="bidang">
                    </div>
                </div>
            </div>
        </div>

         

        <div class="pull-right">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Save</button>
                <a class="btn btn-danger" href="<?php site_url('pelatihan') ?>" role="button">Batal</a>

            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>