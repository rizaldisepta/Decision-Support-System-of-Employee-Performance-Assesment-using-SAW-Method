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
include_once 'includes/kriteria.inc.php';
$pro = new Kriteria($db);
$stmt = $pro->readAll();
?>
    <div class="row">
        <h2>Data Kriteria</h2>
        <div class="col-md-4 text-left">
            
        </div>
        <div class="col-md-6 text-right">
           
        </div>
    </div>
    <br/>

    <table  class="table table-striped " id="tabeldata">
        <thead>
            <tr>
                <th width="20px">No</th>
                <th width="20px">Nama Kriteria</th>
                <th width="20px">Tipe Kriteria</th>
                <th width="20px">Bobot Kriteria</th>
                <th width="20px">Aksi</th>
            </tr>
        </thead>

       

        <tbody  >
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++  ?></td>
                <td><?php echo $row['nama_kriteria'] ?></td>
                <td><?php echo $row['tipe_kriteria'] ?></td>
                <td><?php echo $row['bobot_kriteria'] ?></td>
                <td >
                    <a href="ubah_kriteria.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="kriteria-hapus.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
<?php
}
?>
        </tbody>

    </table>
   <?php 
 $pro = new Kriteria($db);
    $stmt = $pro->readHasil();
  while($row1=$stmt->fetch(PDO::FETCH_ASSOC))
  {
    $jum_nilai=$row1['SUM(bobot_kriteria)']; 
 ?>
  <tr>
    <td class="foot">Total</td>
    <td class="foot"><?php echo $jum_nilai ?></td>
  </tr><br>
  <?php } ?>
  <?php
        if ($no >5 )
        {
        echo "Data Maksimal 5";
        }
        else{
            ?>
            <button onclick="location.href='tambah_nilai.php'" class="btn btn-primary">Tambah Data</button>
            
        <?php
        }
        ?> 
<?php

?>

                  
<!-- /.modal -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>