<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo site_url ('admin/gejala');?>"><?=$title?></a></li>
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
                                <label for="id_gejala" class="col-sm-2 control-label">Kode <i style="color:red">*</i></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="id_gejala" id="id_gejala" readonly="readonly" value="<?php echo $id_gejala; ?>" />
                                    <small><?php echo form_error('id_gejala') ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_gejala" class="col-sm-2 control-label">Nama gejala <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_gejala" id="nama_gejala" placeholder="" maxlength="100" value="<?php echo $nama_gejala; ?>" />
                                    <small><?php echo form_error('nama_gejala') ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pertanyaan" class="col-sm-2 control-label">Pertanyaan <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" placeholder="" maxlength="100" value="<?php echo $pertanyaan; ?>" />
                                    <small><?php echo form_error('pertanyaan') ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fase_gejala" class="col-sm-2 control-label">Fase<i style="color:red">*</i></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="fase_gejala" required>
                                      <option value="" selected disabled>--Pilih Fase--</option>
                                      <option value="1" <?=($fase_gejala == 1) ? "selected" : "" ?>>Pertama</option>
                                      <option value="2" <?=($fase_gejala == 2) ? "selected" : "" ?>>Kedua</option>
                                  </select>
                                  <small><?php echo form_error('fase') ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="bobot_gejala" class="col-sm-2 control-label">Bobot gejala <i style="color:red">*</i></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="bobot_gejala" id="bobot_gejala" placeholder="" value="<?php echo $bobot_gejala; ?>" />
                                <small><?php echo form_error('bobot_gejala') ?></small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8 col-lg-push-2">
                                <div class="action">
                                    <input type="submit" name="save" value="Simpan" class="btn btn-success">

                                    <?php
                                    if ($id_gejala) {
                                        ?>
                                        <a href="<?=base_url().'/admin/gejala'?>" class="btn btn-default">Kembali</a>
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
