<?php
include 'koneksi.php';

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
       }}
  ?>
<!DOCTYPE html>
<html>
  <head>
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
        width: 100%;
        border-radius: 50px, 50px, 50px, 50px;
      }

    .back{
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
  padding: 10px 16px;
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
  background-color: pink;
    }
  .back:focus {
}

.back:hover {
  transform: translateY(-2px);
  background-color: #ec9494;
}

.back:active {
  transform: translateY(2px);
}
.btn-index {
  display: flex;
  justify-content: center;
  gap: 5px;
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
    .base-footer {
        width: 60px;
      height: auto;
      padding-top: 20px;
      margin-left: auto;
  transition: box-shadow .15s,transform .15s;
      margin-right: auto;
    }

    .detail{
        /* text-align: center; */
        display: flex;
        justify-content: center;
    }

    .center {
        text-align: center;
        align-items: center;
    }
    .base-detail {
        width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
    }
    .base-footer:hover {
      transform: translateY(-2px);
    }
    </style>
  </head>
  <body>
        <section class="base-detail"> 
        <div class="center ">
            <h1>Detail Siswa <?php echo $data['nama']; ?></h1>
        </div>
        </section>
      <section class="base">
        <div class = "detail">  
        <img src="foto/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
        </div>
        <div>
           
          <p > <b>id : </b><?php echo $data['id']; ?></p>
        </div>
        <div>
          <p><b>nama : </b><?php echo $data['nama']; ?></p>
        </div>
        <div>
            <p><b>password : </b><?php echo $data['password']; ?></p>
        </div>
        
    </section>
    <div class="base-footer">
        <a class="back" href="index.php">Kembali</a>
    </div>

  </body>
  </html>