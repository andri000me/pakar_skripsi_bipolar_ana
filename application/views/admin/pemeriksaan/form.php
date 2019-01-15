<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo site_url ('admin/pemeriksaan');?>"><?=$title?></a></li>
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
                        <div class="clearfix"></div><br>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-4 control-label">Tanggal <i style="color:red">*</i></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tanggal" id="tanggal" readonly="readonly" value="<?php echo $tanggal; ?>" />
                                    <small><?php echo form_error('tanggal') ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_pasien" class="col-sm-4 control-label">Nama Pasien <i style="color:red">*</i></label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="id_pasien" id="chosen1" data-placeholder="Pilih Pasien...">
                                        <option value="">-- Pilih Pasien --</option>
                                        <?php foreach ($dt_pasien as $pasien) {
                                            if ($pasien->id_pasien === $id_pasien) { ?>
                                            <option value='<?php echo $pasien->id_pasien ?>' selected><?php echo $pasien->nama_pasien?></option>
                                            <?php }else{ ?>
                                            <option value='<?php echo $pasien->id_pasien ?>'><?php echo $pasien->nama_pasien?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <small><?php echo form_error('id_pasien') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div><hr>

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label for="lama_keluhan" class="col-sm-2 control-label">Lama Keluhan Gejala <i style="color:red">*</i></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="lama_keluhan" id="lama_keluhan" value="<?php echo $lama_keluhan; ?>" min="0"/>
                                            <span class="input-group-addon" id="basic-addon2"> Hari</span>
                                        </div>

                                        <small><?php echo form_error('lama_keluhan') ?></small>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="form-group">
                                    <label for="id_gejala" class="col-sm-2 control-label">Gejala yang dialami<i style="color:red">*</i></label>
                                    <div class="col-sm-10">
                                        <small><?php echo form_error('id_gejala') ?></small>

                                        <table class="table table-striped table-bordered" style="margin: 0;">
                                            <?php 
                                            if (sizeof($dt_gejala) > 0) {

                                                $this->load->model('pemeriksaan_model');
                                                $i = 0;
                                                foreach ($dt_gejala as $index => $gejala) {
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="checkboxes">
                                                                <label class="label_check" for="gejala_<?=$gejala->id_gejala?>">
                                                                    <?php 
                                                                    if ($id_diagnosa != '') {
                                                                        $cekgejala = $this->pemeriksaan_model->cekGejalaExist($id_diagnosa, $gejala->id_gejala)->num_rows();
                                                                        if($cekgejala > 0) {
                                                                            $cek = 'checked';
                                                                        } else {
                                                                            $cek = '';
                                                                        }

                                                                        ?>
                                                                        <input name="gejala[]" style="width: 18px;height: 18px;margin-right: 10px;" type="checkbox" value="<?php echo $gejala->id_gejala; ?>" id="gejala_<?php echo $gejala->id_gejala; ?>" <?php echo $cek ?>><?php echo ($i).". ".$gejala->pertanyaan; ?>
                                                                        <?php 
                                                                    } else { 
                                                                        ?>
                                                                        <input name="gejala[]" style="width: 18px;height: 18px;margin-right: 10px;" type="checkbox" value="<?php echo $gejala->id_gejala; ?>" id="gejala_<?php echo $gejala->id_gejala; ?>"><?php echo ($i).". ".$gejala->pertanyaan; ?>
                                                                        <?php 
                                                                    } 
                                                                    ?> 
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }

                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-8 col-lg-push-2">
                                        <div class="action">
                                            <input type="submit" name="save" value="Simpan" class="btn btn-success">

                                            <?php
                                            if ($id_diagnosa) {
                                                ?>
                                                <a href="<?=base_url().'/admin/pemeriksaan'?>" class="btn btn-default">Kembali</a>
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
