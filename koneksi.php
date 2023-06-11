<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $db = "crud"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$db); 

  if(!$koneksi){ //jika tidak konek maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  } 
  ?>