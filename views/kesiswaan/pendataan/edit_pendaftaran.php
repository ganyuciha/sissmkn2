<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$siteurl = 'http://localhost:8080/SISSMKN2';
require ($_SERVER['DOCUMENT_ROOT']."/SISSMKN2/config/Database.php");
require ($_SERVER['DOCUMENT_ROOT']."/SISSMKN2/config/PendaftaranOnline.php");
$pendaftaranonline = new pendaftaranonline();
?>

<?php require ($_SERVER['DOCUMENT_ROOT']."/SISSMKN2/part/header.php"); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pendaftaran</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pendaftaran</a></li>
                            <li class="active">Form Edit Pendaftaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Form </strong>Edit Pendaftaran
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <form action="<?php echo $siteurl; ?>/views/kesiswaan/pendataan/proses.php?aksi=edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                                  <?php
                                    foreach ($pendaftaranonline->getdetailpendaftaran($_GET['user_id']) as $item) {
                                      
                                  ?>
                                      <div class="row">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="user_id" value="<?= $item['user_id']; ?>" class="form-control" readonly></div>
                                          </div>
                                      </div>

                                      <div class="row" style = "margin-top:13px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nomor Induk Siswa Nasional (NISN)</label></div>
                                            <div class="col-12 col-md-9"><input type="number" name="no_induk" value="<?= $item['no_induk']; ?>"  class="form-control"readonly></div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama" value="<?= $item['nama']; ?>"  class="form-control"></div>
                                             
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top:13px;">
                                          <div class="col-6">
                                            <div class="col col-md-4"><label class=" form-control-label">Jenis Kelamin</label></div>
                                            <div class="col">
                                                <?php 
                                            if ($item['kelamin'] == 'L'){ echo '
                                                <div class="form-check">
                                                    <input type="radio" id="radio1" name="kelamin" value="L" class="form-check-input" checked>Laki - laki
                                                </div>

                                                <div class="form-check">
                                                    <input type="radio" id="radio2" name="kelamin" value="P" class="form-check-input">Perempuan
                                                </div>';
                                              }
                                            elseif ($item['kelamin'] == 'P') { echo '
                                                <div class="form-check">
                                                    <input type="radio" id="radio1" name="kelamin" value="L" class="form-check-input">Laki - laki
                                                </div>

                                                <div class="form-check">
                                                    <input type="radio" id="radio2" name="kelamin" value="P" class="form-check-input" checked>Perempuan
                                                </div>';
                                              }
                                              ?>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="sis_email" value="<?= $item['sis_email']; ?>" class="form-control"></div>
                                             
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top:5px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Tanggal Lahir</label></div>
                                            <div class="col-12 col-md-9"><input type="date" id="disabled-input" name="tgl_lahir" value="<?= $item['tgl_lahir']; ?>" class="form-control"></div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kecamatan</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="tmp_lahir" value="<?= $item['tmp_lahir']; ?>" class="form-control"></div>
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top:13px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Alamat</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="alamat" value="<?= $item['alamat']; ?>" class="form-control"></div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kecamatan</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="alamat_camat" value="<?= $item['alamat_camat']; ?>" class="form-control"></div>
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top:13px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Kabupaten</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="alamat_kodya" value="<?= $item['alamat_kodya']; ?>" class="form-control"></div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telepon</label></div>
                                              <div class="col-12 col-md-9"><input type="number" id="text-input" name="ayh_tlp" value="<?= $item['ayh_tlp']; ?>" class="form-control"></div>
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top:13px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Agama</label></div>
                                            <div class="col-12 col-md-9 ">
                                  <select name="agama" id="agama" class="form-control-sm form-control">
                                                                  <option value="<?php echo $item['agama']; ?>">
                                                                    <?php
                                                                    if (($item['agama']) == "ALIRAN KEPERCAYAAN") {
                                                                      echo "ALIRAN KEPERCAYAAN";
                                                                     }elseif (($item['agama']) == "KONGUCHU") {
                                                                      echo "KONGUCHU";
                                                                     }elseif (($item['agama']) == "HINDU") {
                                                                      echo "HINDU";
                                                                     }elseif (($item['agama']) == "BUDHA") {
                                                                      echo "BUDHA";
                                                                    }elseif (($item['agama']) == "KATOLIK") {
                                                                      echo "KATOLIK";
                                                                    }elseif (($item['agama']) == "KRISTEN") {
                                                                      echo "KRISTEN";
                                                                    }elseif (($item['agama']) == "ISLAM") {
                                                                      echo "ISLAM";
                                                                    }elseif (($item['agama']) == "") {
                                                                      echo "-";
                                                                    }else {
                                                                      echo "";
                                                                    }?>
                                                                  </option>
                                                                  <option value=""> </option>
                                                                  <option value="">-</option>
                                                                  <option value="ISLAM">ISLAM</option>
                                                                  <option value="KRISTEN">KRISTEN</option>
                                                                  <option value="KATOLIK">KATOLIK</option>
                                                                  <option value="BUDHA">BUDHA</option>
                                                                  <option value="HINDU">HINDU</option>
                                                                  <option value="KONGUCHU">KONGUCHU</option>
                                                                  <option value="ALIRAN KEPERCAYAAN">ALIRAN KEPERCAYAAN</option>
                                                        </select>
                                                      </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Asal Sekolah</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="sis_tmt_dri" value="<?= $item['sis_tmt_dri']; ?>" class="form-control"></div>  
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top: 14px;">
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">NO Peserta SLTP</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="sis_no_psrta_unas" value="<?= $item['sis_no_psrta_unas']; ?>" class="form-control"></div>
                                            </div>
                                          <div class="col-6">
                                              
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top: 14px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jurusan</label></div>
                                              <div class="col-12 col-md-9 ">
                                  <select name="sis_dtrm_prog_khlian" id="sis_dtrm_prog_khlian" class="form-control-sm form-control">
                                                                  <option value="<?php echo $item['sis_dtrm_prog_khlian']; ?>">
                                                                    <?php
                                                                    if (($item['sis_dtrm_prog_khlian']) == "Jasa Boga") {
                                                                      echo "Jasa Boga";
                                                                     }elseif (($item['sis_dtrm_prog_khlian']) == "Akomodasi Perhotelan") {
                                                                      echo "Akomodasi Perhotelan";
                                                                     }elseif (($item['sis_dtrm_prog_khlian']) == "Perawatan Sosial") {
                                                                      echo "Perawatan Sosial";
                                                                     }elseif (($item['sis_dtrm_prog_khlian']) == "Keperawatan") {
                                                                      echo "Keperawatan";
                                                                    }elseif (($item['sis_dtrm_prog_khlian']) == "Usaha Perjalan Wisata") {
                                                                      echo "Usaha Perjalan Wisata";
                                                                    }elseif (($item['sis_dtrm_prog_khlian']) == "Teknik Komputer Jaringan") {
                                                                      echo "Teknik Komputer Jaringan";
                                                                    }elseif (($item['agama']) == "") {
                                                                      echo "-";
                                                                    }else {
                                                                      echo "";
                                                                    }?>
                                                                  </option>
                                                                  <option value=""> </option>
                                                                  <option value="">-</option>
                                                                  <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                                                  <option value="Usaha Perjalan Wisata">Usaha Perjalan Wisata</option>
                                                                  <option value="Keperawatan">Keperawatan</option>
                                                                  <option value="Perawatan Sosial">Perawatan Sosial</option>
                                                                  <option value="Akomodasi Perhotelan">Akomodasi Perhotelan</option>
                                                                  <option value="Jasa Boga">Jasa Boga</option>
                                                        </select>
                                                      </div>
                                          </div>
                                          <div class="col-6">
                                              <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nilai UN</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="n_unas" value="<?= $item['n_unas']; ?>" class="form-control"></div>
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top: 14px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nilai Rapot</label></div>
                                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="n_raport" value="<?= $item['n_raport']; ?>" class="form-control"></div>
                                          </div>
                                          <div class="col-6">
                                              
                                          </div>
                                      </div>
                                      <div class="row" style = "margin-top: 14px;">
                                          <div class="col-6">
                                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Tahun Aajarn</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="th_ajar" class="form-control"></div>
                                          </div>
                                          <div class="col-6">
                                              </div>
                                      </div>
                            </div>
                            </div>
                            </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Simpan
                      </button>
                      <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                      </button>
                      <?php } ?>
                      
                                      </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


    <?php require ($_SERVER['DOCUMENT_ROOT']."/SISSMKN2/part/footer.php"); ?>