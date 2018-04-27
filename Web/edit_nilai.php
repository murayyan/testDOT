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
                   <?php 
                   $no = $_GET['no'];
                   $query = mysqli_query($connect, "SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis WHERE no='$no'");
                        $row = mysqli_fetch_array($query);
                    ?>
                   <div class="form-group">
                        <label>Kelas</label>
                        <input class="form-control" type="text" readonly="true" value="Kelas <?php echo $row['kelas'] ?>">
                    </div>
                     <div class="form-group">
                        <label>NIS</label>
                        <input class="form-control" type="text" readonly="true" value="<?php echo $row['nis'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" readonly="true" value="<?php echo $row['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input class="form-control" name="nilai" value="<?php echo $row['nilai'] ?>">
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
        $nilai = $_POST['nilai'];
       
         $result = mysqli_query($connect, "UPDATE nilai SET nilai='$nilai' WHERE no='$no'");
        ?>

        <script>
                alert("Update Nilai Berhasil");
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