<?php
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id       = $_POST['id'];
  $nama     = $_POST['nama'];
  $password = md5($_POST['password']);
  $foto     = $_FILES['foto']['name'];

if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file foto yg bisa diupload 
  $x = explode('.', $foto); //pisah nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_foto_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru); //memindah file foto ke folder foto
                  $query = "INSERT INTO detail (id, nama, password, foto)
                            VALUES ('$id', '$nama', '$password', '$nama_foto_baru')";
                  $result = mysqli_query($koneksi, $query);
        
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi foto yang boleh hanya jpg atau png.');window.location='tambah_siswa.php';</script>";
            }
} else {
   $query = "INSERT INTO siswa (id, nama, password, , foto) VALUES ('$id', '$nama', '$password', '$foto')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
                
}

 
