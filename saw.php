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
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
?>
    <br/>
    <div>
    
      <!-- Nav tabs -->
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#lihat" aria-controls="lihat" role="tab" data-toggle="tab">Lihat Semua Data</a></li>
        <li role="presentation"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Perangkingan</a></li>
       
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lihat">
            <br/>
            <div class="row">
                <h2>Data SAW</h2>

                <div class="col-md-6 text-left">
                    
                </div>
                <div class="col-md-4 text-right">
                    <button onclick="location.href='tambah_saw.php'" class="btn btn-primary">Tambah Data</button>
                    <button onclick="location.href='tambah_saw.php'" class="btn btn-second">Lihat Hasil</button>
                </div>
                
            </div>
            <br/>
            <table width="100%" class="table table-striped table-bordered" id="tabeldata">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th width="20px">Alternatif</th>
                        <th width="20px">Kriteria</th>
                        <th width="20px">Nilai</th>
                        <th width="20px">Aksi</th>
                    </tr>
                </thead>
        
                
                <tbody>
        <?php
        $no=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_alternatif'] ?></td>
                        <td><?php 

                        echo $row['nama_kriteria'] ?></td>
                        <td><?php echo $row['nilai_rangking'] ?></td>
                        <td >
                            <a href="ubah_saw.php?ia=<?php echo $row['id_alternatif'] ?>&ik=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="saw-hapus.php?ia=<?php echo $row['id_alternatif'] ?>&ik=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
       
            <?php
        }
        ?>


                </tbody>
        
            </table>
                    
        </div>

        <div role="tabpanel" class="tab-pane" id="rangking">
            <br/>
            <h4>Normalisasi R Perangkingan</h4>
            <table width="100%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
                        <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
                        <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
                    </tr>
                    <tr>
                    <?php
                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <th><?php echo $row2['nama_kriteria'] ?></th>
                    <?php
                    }
                    ?>
                    </tr>
                </thead>
        
                <tbody>
        <?php
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
        ?>
                    <tr>
                        <th><?php echo $row1['nama_alternatif'] ?></th>
                        <?php
                        $a= $row1['id_alternatif'];
                        $stmtr = $pro->readR($a);
                        while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
                            $b = $rowr['id_kriteria'];
                            $tipe = $rowr['tipe_kriteria'];
                            $bobot = $rowr['bobot_kriteria'];
                        ?>
                        <td>
                            <?php 
                            if($tipe=='benefit'){
                                $stmtmax = $pro->readMax($b);
                                $maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
                                echo $nor = $rowr['nilai_rangking']/$maxnr['mnr1'];
                            } else{
                                
                            }
                            $pro->ia = $a;
                            $pro->ik = $b;
                            $pro->nn2 = $nor;
                            $pro->nn3 = $bobot*$nor;
                            $pro->normalisasi();
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                        <td>
                            <?php 
                            $stmthasil = $pro->readHasil($a);
                            $hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
                            echo $hasil['bbn'];
                            $pro->ia = $a;
                            $pro->has = $hasil['bbn'];
                            $pro->hasil();
                            ?>
                        </td>
                    </tr>
        <?php
        }
        ?>
                </tbody>
        
            </table>
                
        </div>
      </div>
    
    </div>
<?php

?>
        </tbody>

    </table>        
<?php

?>

                  
<!-- /.modal -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>