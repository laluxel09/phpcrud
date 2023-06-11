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
        background-size: cover;
   
}
      
      h1 {

        border-radius: 30px;
        background-color: #eea9a9;
        text-transform: uppercase;
        color: white;
        width: 30%;
        border-radius: 50px, 50px, 50px, 50px;
      }
    table {
      
      border: solid 1px #f07b7b;
      border-collapse: collapse;
      border-spacing: 0;
      width: 80%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #eea9a9;
        border: solid 1px #f07b7b;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: black;
        text-decoration: none;
    }
    table tbody td {
      
      background-color: #DDEFEF;
        border: solid 1px #f07b7b;
        color: #333;
        padding: 10px;
        text-shadow: black;
      }
    a {
          background-color: #eea9a9;
          color: black;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
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
.btn-index {
  display: flex;
  justify-content: center;
  gap: 5px;
}

.header {
  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 5px;
}
    </style>
  </head>
  <body>
    <center><h1>Data Siswa</h1>
    <div class="header">

        <a class="button-submit" href="tambah_siswa.php">+ &nbsp; Tambah Siswa</a>
        <a class="button-submit" href="logout.php">- Logout</a>
      </div>
    <br/>
    <table>
      <thead>
        <tr>
          <th style="text-align: center;">No</th>
          <th style="text-align: center;">Id</th>
          <th style="text-align: center;">Nama</th>
          <th style="text-align: center;">Password</th>
          <th style="text-align: center;">Foto</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM detail ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
      }
      $no = 1;
      while($row = mysqli_fetch_assoc($result)) {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td style="text-align: center;"><img src="foto/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td >
            <div class="btn-index">
            <a class="button-submit" href="detail_siswa.php?id=<?php echo $row['id']; ?>">detail</a>|
              <a class="button-submit" href="edit_siswa.php?id=<?php echo $row['id']; ?>">edit</a>|
              <a class="button-submit" href="proses_hapus.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Anda yakin akan menghapus data ini?')">hapus</a>
            </div>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    
    </table>
  </body>
</html>