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
          <i class="fa fa-table"></i> Data Nilai</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Kelas</th>
                  <th>Nama</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Kelas</th>
                  <th>Nama</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody>
                <?php 
                $i=0;
                $sql = mysqli_query($connect, "SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis 
JOIN mapel m ON n.kd_mapel=m.kd_mapel where n.kd_mapel='$_SESSION[mapel]'");
                                         
                                        //tampilkan seluruh data yang ada pada tabel user
                                        while($data = mysqli_fetch_array($sql))
                                         {
                                            $i++; 
                                            echo "<tr class=\"odd gradeX\">";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$data['nis']."</td>";
                                            echo "<td>".$data['kelas']."</td>";
                                            echo "<td>".$data['nama']."</td>";
                                            echo "<td>".$data['nama_mapel']."</td>";
                                            echo "<td>".$data['nilai']."</td>";
                                            echo "<td><a class='btn btn-primary' href='edit_nilai.php?no=$data[no]' role='button'>Edit</a>
                                                    <a class='btn btn-danger' href='delete_nilai.php?no=$data[no]' role='button'>Delete</a></td>";
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