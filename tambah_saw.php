<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Bootstrap 3 Admin</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->
            <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Home</strong></a>

            <hr>

            <ul class="nav nav-stacked">
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">Nilai <i class="glyphicon glyphicon-chevron-down"></i></a>
                    <ul class="nav nav-stacked collapse in" id="userMenu">
                        </li>
                        <li><a href="nilai.php">Lihat Nilai</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2"> Alternatif <i class="glyphicon glyphicon-chevron-right"></i></a>

                    <ul class="nav nav-stacked collapse" id="menu2">
                        </li>
                        <li ><a href="alternatif.php">Lihat Alternatif</a>
                        </li>
                        <li><a href="tambah_alternatif.php">Tambah Alternatif</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">
                    <a href="#" data-toggle="collapse" data-target="#menu3"> Kriteria <i class="glyphicon glyphicon-chevron-right"></i></a>
                    <ul class="nav nav-stacked collapse" id="menu3">
                        <li><a href="kriteria.php"><i class="glyphicon glyphicon-circle"></i> Lihat Kriteria</a></li>
                        
                    </ul>
                </li>
            </ul>

            <hr>

            <a href="#"><strong><i class="glyphicon glyphicon-list"></i> Perhitungan</strong></a>

            <hr>
             <ul class="nav nav-stacked">
                <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#perhitungan">SAW <i class="glyphicon glyphicon-chevron-down"></i></a>
                    <ul class="nav nav-stacked collapse in" id="perhitungan">
                        </li>
                        <li><a href="saw.php">Hasil Perhitungan</a>
                        </li>
                        <li><a href="tambah_saw.php">Tambah Perhitungan</a>
                        </li>
                    </ul>
                </li>
                <ul class="nav nav-stacked">
                <li class="nav-header"> <a href="laporan.php" data-toggle="collapse" data-target="#laporan">Laporan<i class="glyphicon glyphicon-chevron-down"></i></a>
    
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">

            <!-- column 2 -->
            
            <hr>

           

<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pgn1 = new Alternatif($db);
include_once 'includes/kriteria.inc.php';
$pgn2 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pgn3 = new Nilai($db);
if($_POST){
    
    include_once 'includes/rangking.inc.php';
    $eks = new rangking($db);

    $eks->ia = $_POST['ia'];
    $eks->ik = $_POST['ik'];
    $eks->nn = $_POST['nn'];
    
    if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="saw.php">lihat semua data</a>.
</div>
<?php
    }
    
    else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
    }
}
?>
        <div class="row">
            <h2>Tambah SAW</h2>
          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="page-header">
              
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="ia">Alternatif</label>
                    <select class="form-control" id="ia" name="ia">
                        <?php
                        $stmt3 = $pgn1->readAll();
                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                            extract($row3);
                            echo "<option value='{$id_alternatif}'>{$nama_alternatif}</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ik">Kriteria</label>
                    <select class="form-control" id="ik" name="ik">
                        <?php
                        $stmt2 = $pgn2->readAll();
                        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                            extract($row2);
                            echo "<option value='{$id_kriteria}'>{$nama_kriteria}</option>";
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nn">Nilai</label>
                    <input type="text" class="form-control" id="nn" name="nn" required>
                  </div>

                  <?php
                  

                  ?>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  

                  <button type="button" onclick="location.href='saw.php'" class="btn btn-success">Kembali</button>
                </form>
              
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            
          </div>
        </div>
        <?php

?>
                  
<!-- /.modal -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
