<?php require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/part/header.php"); ?>
<?php require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/Database.php"); ?>
<?php require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/config/PendaftaranOnline.php"); ?>

<?php
$object = new pendaftaranonline;
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Siswa Diterima & Tidak Diterima</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Data Siswa Diterima & Tidak Diterima </a></li>
                            <li class="active">List Data Siswa Diterima & Tidak Diterima </li>
                        </ol>
                    </div>
                </div>
            </div>
         </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer">
                          <a href="cetak.php"><button title="export data berupa excel" type="submit" class="btn btn-success btn-sm">
                            <i class="fa ti-upload"></i> Cetak
                          </button>
                          </a>
                          
                          <!-- <a href="surat_keluar.html"><button title="Tambahkan surat keluar" type="reset" class="btn btn-danger btn-sm"><i class="fa ti-export"></i> Tambah Surat Keluar
                          </button></a> -->
                        </div>
                        <div class="card-header">
                            <strong class="card-title">List </strong> Data Siswa Diterima & Tidak Diterima 
                        <div class="card-body">
                          <table id="coba" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>NO.</th>    
                                    <th>ID</th>                           
                                    <th>No Pendaftaran</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Pilihan Program</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                <?php
                                    foreach($object->tampilpendaftaranditerima() as $item){
                                        // print_r($kesiswaan->tampilpendataan());
                                        // die();
                                ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?php echo $item['user_id']; ?></td>
                                    <td><?php echo $item['no_daftar']; ?></td>
                                    <td><?php echo $item['no_induk']; ?></td>
                                    <td><?php echo $item['nama']; ?></td>
                                    <td><?php echo $item['sis_dtrm_prog_khlian']; ?></td>
                                    <td><?php echo $item['status']; ?></td>
                                    
                                      </td>
                                    </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                        </div>
                        <!-- <div class="card-footer">
                          <button title="export data berupa excel" type="submit" class="btn btn-success btn-sm">
                            <i class="fa ti-upload"></i> export
                          </button>
                          <button title="import data dari excel" type="reset" class="btn btn-warning btn-sm">
                            <i class="fa ti-download"></i> import
                          </button>
                        </div> -->
                    </div>
                </div>

                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

      <script>
$(document).ready(function() {
   $('#coba').DataTable( {
       dom: 'Bfrtip',
       buttons: [
           'copyHtml5',
           'excelHtml5',
           'csvHtml5',
           'pdfHtml5',
           'print'
       ]
   } );
} );
</script>

    <!-- Right Panel -->

 <?php require ($_SERVER['DOCUMENT_ROOT']."/sissmkn2/part/footer.php"); ?>