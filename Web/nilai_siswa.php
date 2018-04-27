<?php
    @session_start();
    include"connection.php";
     if (@$_SESSION['level']=='siswa') {
     include 'header.php';
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Nilai</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai</th>
                </tr>
              </tfoot>

              <tbody>
                <?php 
                $i=0;
                $sql = mysqli_query($connect, "SELECT * from nilai n JOIN mapel m ON n.kd_mapel=m.kd_mapel where nis='$_SESSION[nis]'");
                                         
                                        //tampilkan seluruh data yang ada pada tabel user
                                        while($data = mysqli_fetch_array($sql))
                                         {
                                            $i++; 
                                            echo "<tr class=\"odd gradeX\">";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$data['nama_mapel']."</td>";
                                            echo "<td>".$data['nilai']."</td>";
                                            
                                            echo "</tr>";
                                                }   
                 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    

<?php
    include 'footer.php';
    }else{
        header("location: login.php");
    }
    ?>