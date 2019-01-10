<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-th"></i>&nbsp; <?=$title?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url ('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?=$title?></li>
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
                <h4>Daftar <?=$title?><small></small></h4>
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama pasien</th>
                            <th>Umur</th>th>
                            <th>Jenis Kelamin</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $start = 0;
                        if (sizeof($list_data) > 0) {

                            foreach ($list_data as $data)
                            { 
                                ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $data->nama_pasien ?></td>
                                    <td><?php echo $data->umur; ?> </td>
                                    <td><?php echo $data->jenis_kelamin; ?> </td>
                                    <td>
                                        <?php 

                                        echo ' '; 
                                        echo anchor(site_url('admin/pasien/update/'.$data->id_pasien),'<button class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-edit"></i></button>'); 
                                        if ($this->session->userdata('login')['level'] == 'admin') {
                                            echo ' '; 
                                            echo anchor(site_url('admin/pasien/delete/'.$data->id_pasien),'<button class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></button>','onclick="javascript: return confirm(\'Apakah anda yakin data ini akan dihapus ?\')"'); 
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php 
                            }

                        } else {
                            ?>
                            <tr>
                                <td colspan="4"><em style="color:#999;">Tidak ada data yang dapat ditampilkan.</em></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <a href="<?php echo site_url('admin/pasien/create');?>" class="btn btn-info" type="button"><span class="fa fa-plus"></span> Tambah Data</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.row -->
</section>
<!-- /.content -->
