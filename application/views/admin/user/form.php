<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?php echo site_url ('admin/user');?>"><?=$title?></a></li>
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
                            <div class="form-group">
                                <label for="id_user" class="col-sm-4 control-label">ID User <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $id_user; ?>" <?=(!empty($this->uri->segment(4)) ? "readonly" : "")?>/>
                                    <small><?php echo form_error('id_user') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_user" class="col-sm-4 control-label">Nama user <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="" maxlength="100" value="<?php echo $nama_user; ?>" />
                                    <small><?php echo form_error('nama_user') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="" maxlength="100" value="" />
                                    <small><?php echo form_error('password') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm" class="col-sm-4 control-label">Ulangi Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="" maxlength="100" value="" />
                                    <small><?php echo form_error('password_confirm') ?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-4 control-label">level <i style="color:red">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="level" id="level" data-placeholder="Pilih level ...">
                                        <option value="">-- Pilih level --</option>
                                        <?php
                                        for ($i=0; $i < sizeof($dt_level); $i++) { 
                                            if ($dt_level[$i] == $level) {
                                                echo "<option value='".$dt_level[$i]."' selected>".ucfirst($dt_level[$i])."</option>";
                                            }else{
                                                echo "<option value='".$dt_level[$i]."'>".ucfirst($dt_level[$i])."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small><?php echo form_error('level') ?></small>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action pull-right"> 
                                        <input type="submit" name="save" value="Simpan" class="btn btn-success">

                                        <?php
                                        if ($id_user) {
                                            ?>
                                            <a href="<?=base_url().'/admin/user'?>" class="btn btn-default">Kembali</a>
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

