<?php
include 'koneksi.php';

  $id       = $_POST['id'];

  $query = mysqli_fetch_object(mysqli_query($koneksi, "SELECT * FROM detail where id=" . $_GET['id']));

  $nama     = $_POST['nama'];
  $password = md5($_POST['password']);  
  $foto     = $_FILES['foto']['name'];
  if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file foto yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_foto_baru = $angka_acak.'-'.$foto; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
      move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru); //memindah file foto ke folder foto
     mysqli_query($koneksi, "UPDATE detail SET nama = '$nama', password = '$password', foto = '$nama_foto_baru' where id = '$id'");
    
      header("Location: index.php");
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
     
      echo "<script>alert(Ekstensi tidak didukung);</script>";
    }
  } else {
    mysqli_query($koneksi, "UPDATE detail SET nama = '$nama', password = '$password' where id = '$id'");
    // $query .= "WHERE id = '$id'";
    header("Location: index.php");
  }
    
  