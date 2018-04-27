<?php
    @session_start();
    include"connection.php";
     if (@$_SESSION['level']=='guru') {
     include 'header.php';
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Input Nilai</div>
        <div class="card-body">
          <div class="panel-body">
        <form role="form" method="POST">
                   
                   <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                        <option value="A">Kelas A</option>
                        <option value="B">Kelas B</option>
                        <option value="C">Kelas C</option>
                        <option value="D">Kelas D</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name="nis" id="nama" onchange="nis()">
                        <option value="">Please Select</option>
                        <?php
                        $query = mysqli_query($connect, "SELECT  * FROM siswa ORDER BY nama ASC");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option class="<?php echo $row['kelas']; ?>" value="<?php echo $row['nis']; ?>">
                                <?php echo $row['nama']; ?>
                            </option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input class="form-control" name="nilai">
                    </div>
                                        
                    <button type="submit" name="submit" class="btn btn-info">Save </button>
                    <a onclick="window.history.back();return false;" class="btn btn-warning"><i class="fa fa-reply"></i> Back</a>

                </form>
        </div>
        </div>
      </div>
    </div>
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $kd_mapel = $_SESSION['mapel'];
        $nilai = $_POST['nilai'];
       
         $result = mysqli_query($connect, "INSERT INTO nilai (nis,kd_mapel,nilai) VALUES('$nis','$kd_mapel','$nilai')"); 

        ?>

        <script>
                alert("Input Nilai Berhasil");
                location="data_nilai.php";
            </script>
            
            <?php
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/jquery.chained.min.js"></script>
    <script>
            $("#nama").chained("#kelas");
    </script>
    

<?php
    include 'footer.php';
    }else{
        header("location: login.php");
    }
    ?>