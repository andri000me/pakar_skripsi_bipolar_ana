<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo site_url ('admin/aturan');?>"><?=$title?></a></li>
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="id_aturan" class="col-sm-2 control-label">Kode <i style="color:red">*</i></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="id_aturan" id="id_aturan" readonly="readonly" value="<?php echo $id_aturan; ?>" />
                                    <small><?php echo form_error('id_aturan') ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_penyakit" class="col-sm-2 control-label">Nama Penyakit <i style="color:red">*</i></label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="id_penyakit" id="chosen1" data-placeholder="Pilih penyakit...">
                                        <option value=""></option>
                                        <?php foreach ($dt_penyakit as $penyakit) {
                                            if ($penyakit->id_penyakit === $id_penyakit) { ?>
                                                <option value='<?php echo $penyakit->id_penyakit ?>' selected><?php echo $penyakit->nama_penyakit?></option>
                                            <?php }else{ ?>
                                              <option value='<?php echo $penyakit->id_penyakit ?>'><?php echo $penyakit->nama_penyakit?></option>
                                      <?php } ?>
                                            <?php } ?>
                                    </select>
                                    <small><?php echo form_error('id_penyakit') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_gejala" class="col-sm-2 control-label">Nama Gejala<i style="color:red">*</i></label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="id_gejala" id="chosen" data-placeholder="Pilih gejala...">
                                        <option value=""></option>
                                        <?php foreach ($dt_gejala as $gejala) {
                                            if ($gejala->id_gejala === $id_gejala) {
                                                echo "<option value='".$gejala->id_gejala."' selected>".$gejala->nama_gejala."</option>";
                                            }else{
                                                echo "<option value='".$gejala->id_gejala."'>".$gejala->nama_gejala."</option>";
                                            }
                                        }?>`
                                    </select>
                                    <small><?php echo form_error('id_gejala') ?></small>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8 col-lg-push-2">
                                    <div class="action">
                                        <input type="submit" name="save" value="Simpan" class="btn btn-success">

                                        <?php
                                        if ($id_aturan) {
                                            ?>
                                            <a href="<?=base_url().'/admin/aturan'?>" class="btn btn-default">Kembali</a>
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
