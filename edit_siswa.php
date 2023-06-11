 <?php
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM detail WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // ambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada db, maka dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>CRUD Data Siswa</title>
    <style type="text/css">
     @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
  font-family: "Poppins";
      }
      body{
        background-image: url('3.jpg') ;
        background-size: cover;
      }
      h1 {
        background-color: #eea9a9;
        text-transform: uppercase;
        color: white;
        width: 30%;
        border-radius: 50px, 50px, 50px, 50px;
      }
    button {
          background-color: #eea9a9;
          color: black;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #eea9a9;
      border: 2px solid #ccc;
      outline-color: #f07b7b;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }

/* CSS */
.button-submit {
  font-family:"Poppins";
  align-items: center;
  appearance: none;
  border: 0;
  border-radius: 6px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  height: auto;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 15px;
  color: black;
}

.button-submit:focus {
}

.button-submit:hover {
  transform: translateY(-2px);
  background-color: #ec9494;
}

.button-submit:active {
  transform: translateY(2px);
}

    </style>
  </head>
  <body>
      <center>
        <h1>edit siswa <?php echo $data['nama']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php?id=<?= $data['id'] ?>" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id siswa yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>" hidden />
        <div>
          <label>id</label>
          <input type="text" name="id" value="<?php echo $data['id']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>nama</label>
         <input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
        </div>
        <div>
          <label>password</label>
         <input type="password" name="password" required placeholder="Insert New Password"/>
        </div>
        <div>
          <label>foto</label>
          <img src="foto/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">abaikan jika tidak merubah foto</i>
        </div>
        <div style="display: flex; justify-content: space-between;">
         <a href="index.php"><button type="button" class="button-submit" role="buttom">Back</button></a>
         <button type="submit" class="button-submit" role="button">simpan perubahan</button>
        </div>
        </section>
      </form>
  </body>
  </html>