<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:../login.php");
  exit;
}

require '../../fungsi.php';
$t = date('M-Y'); 
$id = $_SESSION["id"];
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
$rows = mysqli_fetch_assoc($sql);
$id_admin=$rows["id_admin"];
$sql1=mysqli_query($conn,"SELECT * FROM admin WHERE id_admin = $id_admin");
$rows1 = mysqli_fetch_assoc($sql1);
$foto=$rows1["foto"];
$nama = $rows1["nama"];
$result = mysqli_query($conn,"SELECT * FROM vtesti  ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if(isset($_POST["submit"])){
  $tgl = date('d-m-Y H:i:s'); 
  $link1 = $_POST["link1"];
  $fotolama1 = $_POST["fotolama1"];
     if($_FILES['filefoto1']['error']===4) {
      $foto1 = $fotolama1;
      }else{
      $filefoto1 = $_FILES["filefoto1"]["name"];
          $ekstensi_diperbolehkan1 = array('png','jpg','jpeg','bmp');
          $x1 = explode('.', $filefoto1);
          $ekstensi1 = strtolower(end($x1));
          $ukuran1 = $_FILES['filefoto1']['size'];
          $foto1_tmp = $_FILES['filefoto1']['tmp_name'];  
          if(in_array($ekstensi1, $ekstensi_diperbolehkan1) === true){
            if($ukuran1 < 2000000){
             $filefotoBaru1 = uniqid();
              $filefotoBaru1 .= '.';
              $filefotoBaru1 .= $ekstensi1;
             $move1 = move_uploaded_file($foto1_tmp, '../../img/video/'.$filefotoBaru1);
              if($move1){
                if (unlink('../../img/video/'.$fotolama1))
                { "Deleted ../../img/video/$fotolama1";
                  "<META HTTP-EQUIV=Refresh CONTENT='1; URL=video.php'>";
                } 
                $foto1 =$filefotoBaru1;
              }else{echo"<script>
                          alert(' Gagal uploud foto');
                          document.location.href = 'login.php';
                          </script>"; return false;}
            }else{echo"<script>
                        alert('Gagal uploud foto ... Ukuran FOTO max 2Mb');
                        document.location.href = 'login.php'; 
                        </script>";return false;}
          }else{echo"<script>
                      alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                      document.location.href = 'login.php';
                      </script>";return false;}
          } 
  $link2 = $_POST["link2"];
  $fotolama2 = $_POST["fotolama2"];
     if($_FILES['filefoto2']['error']===4) {
      $foto2 = $fotolama2;
      }else{
      $filefoto2 = $_FILES["filefoto2"]["name"];
          $ekstensi_diperbolehkan2 = array('png','jpg','jpeg','bmp');
          $x2 = explode('.', $filefoto2);
          $ekstensi2 = strtolower(end($x2));
          $ukuran2 = $_FILES['filefoto2']['size'];
          $foto2_tmp = $_FILES['filefoto2']['tmp_name'];  
          if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
            if($ukuran2 < 2000000){
             $filefotoBaru2 = uniqid();
              $filefotoBaru2 .= '.';
              $filefotoBaru2 .= $ekstensi2;
             $move2 = move_uploaded_file($foto2_tmp, '../../img/video/'.$filefotoBaru2);
              if($move2){
                if (unlink('../../img/video/'.$fotolama2))
                { "Deleted ../../img/video/$fotolama2";
                  "<META HTTP-EQUIV=Refresh CONTENT='1; URL=video.php'>";
                } 
                $foto2 =$filefotoBaru2;
              }else{echo"<script>
                          alert(' Gagal uploud foto');
                          document.location.href = 'login.php';
                          </script>"; return false;}
            }else{echo"<script>
                        alert('Gagal uploud foto ... Ukuran FOTO max 2Mb');
                        document.location.href = 'login.php'; 
                        </script>";return false;}
          }else{echo"<script>
                      alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                      document.location.href = 'login.php';
                      </script>";return false;}
          } 
  $link3 = $_POST["link3"];
  $fotolama3 = $_POST["fotolama3"];
     if($_FILES['filefoto3']['error']===4) {
      $foto3 = $fotolama3;
      }else{
      $filefoto3 = $_FILES["filefoto3"]["name"];
          $ekstensi_diperbolehkan3 = array('png','jpg','jpeg','bmp');
          $x3 = explode('.', $filefoto3);
          $ekstensi3 = strtolower(end($x3));
          $ukuran3 = $_FILES['filefoto3']['size'];
          $foto3_tmp = $_FILES['filefoto3']['tmp_name'];  
          if(in_array($ekstensi3, $ekstensi_diperbolehkan3) === true){
            if($ukuran3 < 2000000){
             $filefotoBaru3 = uniqid();
              $filefotoBaru3 .= '.';
              $filefotoBaru3 .= $ekstensi3;
             $move3 = move_uploaded_file($foto3_tmp, '../../img/video/'.$filefotoBaru3);
              if($move3){
                if (unlink('../../img/video/'.$fotolama3))
                { "Deleted ../../img/video/$fotolama3";
                  "<META HTTP-EQUIV=Refresh CONTENT='1; URL=video.php'>";
                } 
                $foto3 =$filefotoBaru3;
              }else{echo"<script>
                          alert(' Gagal uploud foto');
                          document.location.href = 'login.php';
                          </script>"; return false;}
            }else{echo"<script>
                        alert('Gagal uploud foto ... Ukuran FOTO max 2Mb');
                        document.location.href = 'login.php'; 
                        </script>";return false;}
          }else{echo"<script>
                      alert('Gagal uploud foto ... Ekstensi Foto yang diperbolehkan png dan jpg');
                      document.location.href = 'login.php';
                      </script>";return false;}
          }

    //        $query = "INSERT INTO vtesti VALUES ('','$tgl','$foto1','$link1','$foto2','$link2','$foto3','$link3')";
    // mysqli_query($conn, $query);

 $query = "UPDATE vtesti SET tgl='$tgl', link1='$link1', foto1='$foto1',  link2='$link2', foto2='$foto2',  link3='$link3', foto3='$foto3'";
 mysqli_query($conn, $query);

 if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah');
    document.location.href = 'login.php';
    </script>";} 
  else {
    echo"<script>alert('Data gagal diubah');
    document.location.href = 'login.php';
    </script>";}
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="../../css/animasi.css">
    <link rel="stylesheet" href="../../css/animate.css">
  <title></title>
  <style>
  body{
  min-height: 1500px;
  }
  .tab {
      border: 2px solid black;
      padding: 5px;
    }
  .home{
      margin-top: -180px;
    }
  </style>
</head>
<body>
<nav class="navbar fixed-top navbar-light">
      <a class="navbar-brand" href="#">
        <img src="../../img/ssci2.png" height="40">
        SSCIntersolusi
      </a>
    </nav>
    <div class="row">
      <div class="col-md-2 mt-3">
        <?php
            include("../time.php");
            include("../menu.php");
            include("../animasi.php");
        ?>
      </div>
      <div class="col-md-10 mt-3">
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
 <section  class="d-md-none">
        <center><h3>Open in PC</h3></center>
      </section>
      <section class="tab d-none d-md-block">
       <div class="header">
        <img src="../../img/tugus.jpg" width="100%">
       </div>
       <br>
        <center><h2>Ganti Video Testimoni</h2></center>
        <br>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row fg1">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                     <label for="gambar" class="control-label">Image 1</label>
                     <input type="file" name="filefoto1" value="" class="form-control" id="gambar" >
                     <input type="hidden" name="fotolama1" value="<?=$row["foto1"];?>">
                  </div>
                </div>
                <div class="col-md-4">

                  <div class="form-group">
                   <label for="link1" class="control-label">Video 1</label>
                   <input type="text" name="link1" class="form-control" id="link1" autocomplete="off" value='<?=$row["link1"];?>'>
                 </div>


                 
                </div>
              </div>
              <br>
              <div class="row fg1">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                     <label for="gambar" class="control-label">Image 2</label>
                     <input type="file" name="filefoto2" value="" class="form-control" id="gambar" >
                     <input type="hidden" name="fotolama2" value="<?=$row["foto2"];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="video" class="control-label">Video 2</label>
                    <input type="text" name="link2" class="form-control" id="video" autocomplete="off" value='<?=$row["link2"];?>'>
                  </div>
                </div>
              </div>
              <br>
              <div class="row fg1">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                     <label for="gambar" class="control-label">Image 3</label>
                     <input type="file" name="filefoto3" value="" class="form-control" id="gambar" >
                     <input type="hidden" name="fotolama3" value="<?=$row["foto3"];?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="video" class="control-label">Video 3</label>
                    <input type="text" name="link3" class="form-control" id="video" autocomplete="off" value='<?=$row["link3"];?>'>
                  </div>
                </div>
              </div>
            <center><input type="submit" name="submit" class="btn btn-outline-dark mt-3" value="Kirim"/></center>
          </form>
        </section>
        <section class="d-none d-md-block">
             <span style="font-weight: bolt; color: red; font-size: 20px;" class="mt-2">Catatan</span><br>
             <span>Ukuran IMAGE 2 : 1  </span>
           </section>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
     </div>
   </div>
      <?php
       include("../footer.php");
      ?>
</body>
</html> 