<?php
  include('koneksi.php'); 
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
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Siswa</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>id</label>
          <input type="text" name="id" autofocus="" required="" />
        </div>
        <div>
          <label>nama siswa</label>
         <input type="text" name="nama" />
        </div>
        <div>
          <label>password</label>
         <input type="password" name="password"/>
        </div>
        <div>
          <label>foto siswa</label>
         <input type="file" name="foto" required="" />
        </div>
        <div>
         <button type="submit">simpan data</button>
        </div>
        </section>
      </form>
  </body>
</html>