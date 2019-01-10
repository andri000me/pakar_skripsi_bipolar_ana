<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo site_url ('admin/pasien');?>"><?=$title?></a></li>
    <li class="active"><?=$subtitle?></li>
</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <!-- notification template -->
        <?php
        if($this->session->flashdata('message') <> '') { ?>
        <div class="alert alert-<?=$this->session->flashdata('message')[0]?> alert-dismissable" id="msgShow">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
            <?php echo $this->session->flashdata('message')[1]; ?>
            <div class="clearfix"></div>
        </div>
        <?php } ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><?=$subtitle." ".$title?><small></small></h4>
            </div>

            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $id_pasien; ?>" />
                            <div class="form-group">
                                <label for="nama_pasien" class="col-sm-4 control-label">Nama pasien <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="" maxlength="100" value="<?php echo $nama_pasien; ?>" />
                                    <small><?php echo form_error('nama_pasien') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur_pasien" class="col-sm-4 control-label">Umur pasien <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="umur" id="bobot_pasien" placeholder="" value="<?php echo $umur; ?>" />
                                    <small><?php echo form_error('bobot_pasien') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur" class="col-sm-4 control-label">Gender Pasien</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="jenis_kelamin" required="">
                                        <option value="" disabled="" selected="">--Pilih Gender--</option>
                                        <option value="laki-laki">Laki - Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action pull-right"> 
                                        <input type="submit" name="save" value="Simpan" class="btn btn-success">

                                        <?php
                                        if ($id_pasien) {
                                            ?>
                                            <a href="<?=base_url().'/admin/pasien'?>" class="btn btn-default">Kembali</a>
                                            <?php 
                                        } else {
                                            ?>
                                            <input type="reset" name="reset" value="Reset" class="btn btn-danger">
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>   
                            <div class="clearfix"></div>
                            <br><br>  
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.row -->
    </section>
    <!-- /.content -->

