<?php 
    include 'koneksi.php';
    session_start();

    if (!isset($_SESSION['name'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Go Rent</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
	<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-60">
                    <i class='fas fa-car-side' style='font-size:48px;color:white'></i>
                </div>
                <div class="sidebar-brand-text mx-3">GO RENT</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="mobil.php">
                    <i class='fas fa-car-side'></i>
                    <span>Data Mobil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pemesan.php">
                    <i class="fas fa-user"></i>
                    <span>Data Pemesan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="perjalanan.php">
                    <i class="fas fa-road"></i>
                    <span>Data Perjalanan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fas fa-receipt"></i>
                    <span>Data Pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="akun.php">
                <i class="fas fa-fw fa-cog"></i>
                    <span>Data Akun</span></a>
            </li>
        
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">
                                
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block">

                        </div>

                        <!-- Nav Item - User Information -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name'] ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="logout.php" onclick="return confirm('apakah anda yakin?')">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                            </ul>
                    </ul>
                </nav>
    
                <?php
                    //if there's any user action
                    $action = isset ($_POST['action']) ? $_POST['action'] : "";

                    if($action == 'create'){ // the the user submitted the form

                        //include database connection
                        include 'koneksi.php';

                    
                        //our insert query query
                        //$mysqli->real_escape_string() function helps us prevent attack such as SQL injection
                        $query = "Insert into tbl_mobil set
                                merk ='".$mysqli->real_escape_string($_POST['merk'])."',
                                nama ='".$mysqli->real_escape_string($_POST['nama'])."',
                                warna   ='".$mysqli->real_escape_string($_POST['warna'])."',
                                no_polisi  ='".$mysqli->real_escape_string($_POST['no_polisi'])."',
                                jumlah_kursi  ='".$mysqli->real_escape_string($_POST['jumlah_kursi'])."',
                                tahun_beli  ='".$mysqli->real_escape_string($_POST['tahun_beli'])."'";
                        
                        //execute the query
                        if($mysqli->query($query)){
                            //if saving success
                            echo "<div class='row'>";
                                echo "<div class='col-sm-9'></div>";
                                echo "<div class='col-sm-3 text-right alert alert-success alert-dismissible fade show'>Data berhasil ditambahkan</div>";
                                echo "</div>";
                            echo "</div>";
                        }else{
                            //if unable to create new record
                            echo "<div class='row'>";
                                echo "<div class='col-sm-9'></div>";
                                echo "<div class='col-sm-3 text-right alert alert-success alert-dismissible fade show'>Gagal menambahkan data</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        //close database connection
                        $mysqli->close();
                    }
                ?>
    
   
                <div class="container-fluid">

                    <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-xl-3 col-md-6 mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <!-- Tambah Data -->
                        <div class="col-sm-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="#" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="merk">Nama Merk</label>
                                            
                                            <select name = 'merk' class="form-control">
                                                <option value = 'Toyota' >Toyota</option>
                                                <option value = 'Daihatsu'>Daihatsu</option>
                                                <option value = 'Suzuki'>Suzuki</option>
                                                <option value = 'Honda'>Honda</option>
                                                <option value = 'Nissan'>Nissan</option>
                                                <option value = 'Datsun'>Datsun</option>
                                                <option value = 'Mitsubishi'>Mitsubishi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Mobil</label>
                                            <input type="text" name="nama" id="nama" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="warna">Warna Mobil</label>
                                                <input type="text" name="warna" id="warna" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="jumlah_kursi">Jumlah Kursi</label>
                                                <input type="number" name="jumlah_kursi" id="jumlah_kursi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="no_polisi">No Polisi</label>
                                                <input type="text" name="no_polisi" id="no_polisi" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="tahun_beli">Tahun Beli</label>
                                                <input type="number" name="tahun_beli" id="tahun_beli" required="required" placeholder="ketik" autocomplete="off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                            <input type='hidden' name='action' value='create'/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End of Tambah Data -->
                        
                        <!-- Daftar Mobil -->
                        <div class="col-sm-8">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <?php

                                        include 'koneksi.php';
                                        
                                        $action = isset($_GET['action']) ? $_GET['action'] : "";
                                        
                                        //query all records from the database
                                        $query = "select * from tbl_mobil";

                                        //execute the query
                                        $result = $mysqli->query($query);
                                        
                                        //get number of rows returned
                                        $num_results = $result->num_rows;
                                        
                                        if($num_results > 0){
                                            echo "<table class='table table-bordered' id='dataTable' cellspacing='0'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>No</th>";
                                                    echo "<th>Merk</th>";
                                                    echo "<th>Mobil</th>";
                                                    echo "<th>Warna</th>";
                                                    echo "<th>Kursi</th>";
                                                    echo "<th>Aksi</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            $no = 1;
                                            while($row = $result->fetch_assoc()){
                                                extract($row);
                                    ?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['merk']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['warna']; ?></td>
                                                <td><?php echo $row['jumlah_kursi']; ?></td>
                                                <td>
                                                    <a href='edit_mobil.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-info'><i class='fa fa-pen'></i>Edit</a>
                                                    <a href='detail_mobil.php?id=<?php echo $row['id']; ?>' class='btn btn-sm btn-warning'><i class='fa fa-eye'></i> Detail</a>
                                                    <?php echo "<a href='mobil.php' onclick='delete_data( {$id} );' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</a>" ?>
                                                </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>

                                            </tbody>
                                            </table>
                                            <!-- End of Table -->

                                    <?php
                                        if($action=='delete'){ //if the user clicked oke, run our delete query
                                            //mysqli->real_escape_string() function helps us prevent attact such as SQL injection
                                            $query = "DELETE FROM tbl_mobil WHERE id = ".$mysqli->real_escape_string($_GET['id'])."";
                                            
                                            //execute query
                                            if($mysqli->query($query)){
                                                //if successful deletion
                                                echo "<p>Data berhasil dihapus</p>";
                                            }else{
                                                echo "Database Error: Unable to deleted record.";
                                            }
                                        }
                                    }else{
                                        //if database table is empty
                                        //echo "Data tidak ditemukan";
                                    }
                                    $result->free();
                                    $mysqli->close();
                                    ?>
                                
                                    <script type='text/javascript'>
                                        function delete_data(id){
                                            //prompt the user
                                            var answer = confirm('Are you sure?');
                                            if(answer){ //if user clicked ok
                                                //redirect to url wirh action as delete and id of the record to be delected
                                                window.location = 'mobil.php?action=delete&id=' + id;
                                            }
                                        }
                                    </script>

                                </div><!-- End of Card Daftar Mobil -->
                            </div><!-- End of Card Shadow Daftar Mobil -->
                        </div><!-- End of Daftar Mobil -->
                    </div><!-- End of row tambah data n tabel data -->
                </div><!-- End of container-fluid -->
                
                <!-- Footer --> 
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><a>Elsi - Ereen </a>&copy; Go Rent 2022</span>
                        </div>
                    </div>
                </footer>
            
            </div><!-- End of content -->
        </div><!-- End of content-wrapper -->
    </div><!-- End of wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
