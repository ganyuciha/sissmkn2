<?php

class t_prakerin_siswa extends Database {
    var $table = 't_prakerin_siswa';
    var $nilai = 'tbl_nilaiprakerin';
    var $jurnal = 'jurnal';

    function tampildata() {
        $con = $this->dbconnect();
        $sql = "select t_prakerin_siswa.id_siswa_prakerin, t_sis_thajar.no_induk,t_sis_thajar.nama,t_prakerin.nama_prakerin,t_prakerin.kota_prakerin,t_prakerin.pembimbing,t_prakerin_siswa.tgl_start,t_prakerin_siswa.tgl_akhir,t_prakerin.program from t_prakerin_siswa JOIN t_sis_thajar ON t_prakerin_siswa.nis=t_sis_thajar.no_induk JOIN t_prakerin ON t_prakerin_siswa.id_tmp_prakerin=t_prakerin.id_tmp_prakerin";
        $query = mysqli_query($con,$sql);
		while($data = mysqli_fetch_array($query)){
			$hasil[] = $data;
        }    
        
		return $hasil;
    }

    function getNamaPrakerin()
    {
        $con = $this->dbconnect();
        $sql = "select id_tmp_prakerin, nama_prakerin from t_prakerin";
        $query = mysqli_query($con,$sql);
        while($data = mysqli_fetch_array($query)){
            $hasil[] = $data;
        }
        return $hasil;
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlne($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        print_r($randomString);
        die();

}

function tampilidprs() {
        $date = date('dmHi');
        $id = "PRS".$date;
        return $id;
    }

    function inserttbl_pendaftaran_prakerin($id_tmp_prakerin, $nis, $lama_bln, $tgl_start, $tgl_akhir, $kelas, $prakerinke) {
        $con = $this->dbconnect();
        $sql = 'INSERT INTO '.$this->table.' VALUES(NULL, "'.$id_tmp_prakerin.'", "'.$nis.'", "'.$lama_bln.'", "'.$tgl_start.'", "'.$tgl_akhir.'", "'.$kelas.'", "'.$prakerinke.'")     ';
        $query = mysqli_query($con,$sql);
        
        return $con;
    }

    function insertToNilai($insertId)
    {
        $con = $this->dbconnect();
        $sql = 'INSERT INTO '.$this->nilai.' VALUES(NULL, "'.$insertId.'", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)';
        $query = mysqli_query($con,$sql);
    }

    function insertToJurnal($insertId)
    {
        $con = $this->dbconnect();
        $sql = 'INSERT INTO '.$this->jurnal.' VALUES(NULL, "'.$insertId.'")';
        $query = mysqli_query($con,$sql);
        
    }

    function insertToJurnalDetail($id_jurnalprakerin, $id_jurnal)
    {
        $con = $this->dbconnect();
        $sql = 'INSERT INTO '.$this->jurnal.' VALUES("'.''.'", "'.$id_jurnal.'", "", "")';
        $query = mysqli_query($con,$sql);
    }

    function getdetail_pendaftaran_prakerin($id_siswa_prakerin){
        $con = $this->dbconnect();
        $sql = 'select t_prakerin_siswa.id_siswa_prakerin, t_prakerin_siswa.lama_bln, t_prakerin_siswa.kelas, t_prakerin_siswa.prakerinke, t_sis_thajar.no_induk,t_sis_thajar.nama,t_prakerin.nama_prakerin,t_prakerin.kota_prakerin,t_prakerin.pembimbing,t_prakerin_siswa.tgl_start,t_prakerin_siswa.tgl_akhir,t_prakerin.program from t_prakerin_siswa JOIN t_sis_thajar ON t_prakerin_siswa.nis=t_sis_thajar.no_induk JOIN t_prakerin ON t_prakerin_siswa.id_tmp_prakerin=t_prakerin.id_tmp_prakerin where id_siswa_prakerin = '.(int)$id_siswa_prakerin;
        $query = mysqli_query($con,$sql);
        while($data = mysqli_fetch_array($query)){
            $hasil[] = $data;
        }
            
        return $hasil;
    }

   function updatetbl_perusahaan($id_siswa_prakerin, $id_tmp_prakerin, $nis, $lama_bln, $tgl_start, $tgl_akhir, $kelas, $prakerinke)
    {
        $con = $this->dbconnect();
        $sql = 'UPDATE '.$this->table.' SET id_tmp_prakerin="'.$id_tmp_prakerin.'", nis="'.$nis.'",  lama_bln="'.$lama_bln.'", tgl_start="'.$tgl_start.'", tgl_akhir="'.$tgl_akhir.'", kelas="'.$kelas.'", prakerinke="'.$prakerinke.'" where id_siswa_prakerin= "'.$id_siswa_prakerin.'"';
        $query = mysqli_query($con,$sql) or die(mysqli_error($con));
    }

   function deletetbl_perusahaan($id_siswa_prakerin)
    {
        $con = $this->dbconnect();
        $sql = 'DELETE from '.$this->table.' where id_siswa_prakerin = "'.$id_siswa_prakerin.'"';
        $query = mysqli_query($con,$sql);
    }
}
    ?>