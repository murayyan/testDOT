<?php
    @session_start();
    include"connection.php";
     if (@$_SESSION['level']=='guru') {
     
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Master Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="css/custom-styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="styless.css">
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style type="text/css">
    .sidebar-collapse{
        margin-top: 150px;
    }
    #page-inner {
        
        min-height:600px;
    }
    #page-wrapper{
        
        min-height:600px;
        }
        #center{
    padding: 20px;
    text-align: center;
    color: #424242;
    font-size: 25px;
    font-weight:bold;
    
}
    .btn{
    width: 260px;
    height: 35px;
    background-color: #1CC09F;
    color: #ffffff;
    font-weight: bold;
    font-size: 12px; 
    }
    .btn:hover{
    cursor: pointer;
    background-color: #009688;
    }
    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-comments"></i> <strong>SIAM</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i>Dashboar Admin</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        <div id='tampiluser'>
   <?php
      if (@$_SESSION['admin']) {
         $userlog = @$_SESSION['admin'];
         # code...
      }else if(@$_SESSION['dosen']) {
         $userlog = @$_SESSION['dosen'];
      }else{
         $userlog = @$_SESSION['mahasiswa'];
      }
      $sql = mysqli_query($connect,"select nama from user where id_user = '$userlog'") or die (mysqli_error());
      $data = mysqli_fetch_array($sql);
      
   ?>
   </br>
   <div>
      <div id="gbr">
                 <center> <img src="img/avatar5.png" /></center>   
          </div>
   </div>
   <span><center><?php echo $data['nama'];?></center></span>
</div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                                      
                    <li>
                        <a href="indexadmin.php"><i class="fa fa-dashboard"></i>Dashboar Admin</a>
                    </li>
                    <li>
                        <a class="active-menu" href="ui-elements.html"><i class="glyphicon glyphicon-folder-open"></i>Data Admin</a>
                         <ul class="nav nav-third-level">
                                    <li>
                                        <a  href="tambahadmin.php">Tambah Admin</a>
                                    </li>
                                    <li>
                                        <a class="active-menu" href="dataadmin.php">Data Admin</a>
                                    </li>
                                    

                                </ul>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="glyphicon glyphicon-folder-open"></i>Data Dosen</a>
                         <ul class="nav nav-third-level">
                                    <li>
                                        <a href="tambahdosen.php">Tambah Dosen</a>
                                    </li>
                                    <li>
                                        <a href="datadosen.php">Data Dosen</a>
                                    </li>
                                    

                                </ul>
                    </li>
                    <li>
                        <a href="datamahasiswa.php"><i class="glyphicon glyphicon-folder-open"></i>Data Mahasiswa</a>
                         
                    </li>
                    
                    
                </ul>

            </div>

        </nav>
        <!-- /. Content  -->
<div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div id="center">
            Data Admin
            </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Admin Fakultas</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i=0; //inisialisasi untuk penomoran data
                                        //perintah untuk menampilkan data, id_brg terbesar ke kecil
                                        
                                        //perintah menampilkan data dikerjakan
                                        $sql = mysqli_query($connect, "SELECT username,nama,fakultas.fakultas from 
admin INNER JOIN fakultas ON admin.fakultas=fakultas.id_fakultas ORDER BY admin.id_admin");
                                         
                                        //tampilkan seluruh data yang ada pada tabel user
                                        while($data = mysqli_fetch_array($sql))
                                         {
                                            $i++;           

                                    echo "<tr class=\"odd gradeX\">";
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$data['username']."</td>";
                                    echo "<td>".$data['nama']."</td>";
                                    echo "<td>".$data['fakultas']."</td>";
                                    echo "</tr>";
                                         }
                                        ?>
                                        </tbody>
                                        
                                        </table></div></div>
                                        </div></div>
                                        </div>
                                        </div></div>


        -->
        
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
     
    <!-- Metis Menu Js -->
    <script src="js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="js/morris/raphael-2.1.0.min.js"></script>
    <script src="js/morris/morris.js"></script>
    
    
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="js/custom-scripts.js"></script>
    
    



</body>

</html>
<?php
    }else{
        header("location: login.php");
    }
    ?>