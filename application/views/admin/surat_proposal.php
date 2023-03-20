 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

     <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <a href="<?= site_url('Dashboard_Admin') ?>">
                     <i class="fas fa-fw fa-tachometer-alt"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
         </ol>
     </nav>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
         </div>
         <div class="card-body">

             <?php if ($this->session->flashdata('notification_berhasil') != '') { ?>
                 <div class="alert alert-success alert-dismissable">
                     <i class="glyphicon glyphicon-ok"></i>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $this->session->flashdata('notification_berhasil'); ?>
                 </div>
             <?php } else if ($this->session->flashdata('notification_gagal') != '') { ?>
                 <div class="alert alert-danger alert-dismissable">
                     <i class="glyphicon glyphicon-ok"></i>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $this->session->flashdata('notification_gagal'); ?>
                 </div>
             <?php } ?>

             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-surat">
                 <span btn-icon-left>
                     <i class="fa fa-plus"></i> Tambah Data
                 </span>
             </button>
             <br>
             <br>

             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="text-align: center;">Node</th>
                             <th style="text-align: center;">Fiber Desc</th>
                             <th style="text-align: center;">Class</th>
                             <th style="text-align: center;">Hub</th>
                             <th style="text-align: center;">Hub Desc</th>
                             <th style="text-align: center;">City Town</th>
                             <th style="text-align: center;">Ftax</th>
                             <th style="text-align: center;">Ftax Desc</th>
                             <th style="text-align: center;">Ready To Sell</th>
                             <th style="text-align: center;">Homepass All</th>
                             <th style="text-align: center;">Act Pay All</th>
                             <th style="text-align: center;">Penetration Pay All</th>
                             <th style="text-align: center;">Penetration All</th>
                             <th style="text-align: center;">Avg Rate All</th>
                             <th style="text-align: center;">Revenue</th>
                             <th style="width:300px; text-align: center;">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            foreach ($fibernode as $item) {
                                $date = $item['rel_tsell'];
                                $dateformat_database = date("d M Y", strtotime($date));
                            ?>
                             <tr>
                                 <td><?= $item['node'] ?></td>
                                 <td><?= $item['fiber_desc'] ?></td>
                                 <td><?= $item['class'] ?></td>
                                 <td><?= $item['hub'] ?></td>
                                 <td><?= $item['hub_desc'] ?></td>
                                 <td><?= $item['city_town'] ?></td>
                                 <td><?= $item['ftax'] ?></td>
                                 <td><?= $item['ftax_desc'] ?></td>
                                 <td><?= $dateformat_database ?></td>
                                 <td><?= $item['hp_all'] ?></td>
                                 <td><?= $item['act_payall'] ?></td>
                                 <td><?= $item['pen_payall'] ?></td>
                                 <td><?= $item['pen_all'] ?></td>
                                 <td><?= $item['avg_rateall'] ?></td>
                                 <td><?= $item['revenue'] ?></td>
                                 <td style="text-align: center;">
                                     <!-- Tombol Edit -->
                                     <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-surat<?= $item['node'] ?>">
                                         <span btn-icon-left>
                                             <i class="fa fa-edit"></i>
                                         </span>
                                         Edit</button>
                                     &emsp;
                                     <!-- Tombol Hapus -->
                                     <button onclick="delete_repositori_ajax(<?= $item['node'] ?>)" type="submit" class="btn btn-danger btn-sm">
                                         <span btn-icon-left>
                                             <i class="fa fa-trash"></i>
                                         </span>
                                         Hapus</button>
                                 </td>
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
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- MODAL -->
 <!--Modal dialog box for edit surat-->

 <!--Modal dialog box for tambah surat-->

 <script type="text/javascript">
     function delete_repositori_ajax(id) {
         if (confirm("Anda yakin ingin menghapus data ini ?")) {
             ;
             $.ajax({
                 url: 'Surat_Proposal/delete_surat',
                 type: 'POST',
                 data: {
                     id: id
                 },
                 success: function() {
                     alert('Delete data berhasil');
                     location.reload();
                 },
                 error: function() {
                     alert('Delete data gagal');
                 }
             });
         }
     }
 </script>