<?php
    @session_start();
    include"connection.php";
    if (@$_SESSION['level']=='guru') {
      header("location: guru.php");
    }else if (@$_SESSION['level']=='siswa') {
      header("location: siswa.php");
    }else{
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <div id="utama">
     <div id="login">
       Login
     </div>
     <div id="input">
       <form action="" method="post">
         <div>
           <input type="text" name="user" placeholder="Username" class="form-control" required />
         </div>
         <div style="margin-top:7px;">
           <input type="password" name="pass" placeholder="Password" class="form-control" required />
         </div>
         <div style="margin-top:7px;">
           <input type="submit" name="login" value="Login" class="btn" />
         </div>
         <div>
          <pre>
Login Guru Matematika:
username : 12345
password : matematika

Login Guru Matematika:
username : 12346
password : bahasa

Login Siswa:
username : 900123
password : rayyan

username : 900112
password : farah
           </pre>
         </div>
       </form>
       </div>
  <?php
  $user = @$_POST['user'];
  $pass = @$_POST['pass'];

  if (@$_POST['login']) {
    if (substr($user,0,2)==12) {
      $sql = mysqli_query($connect,"SELECT * FROM guru WHERE nip='$user' and password=md5('$pass')");
      @$_SESSION['level']='guru';
    }else{
      $sql = mysqli_query($connect,"SELECT * FROM siswa WHERE nis='$user' and password=md5('$pass')");
      @$_SESSION['level']='siswa';
    }
      $data = mysqli_fetch_array($sql);
      $cek = mysqli_num_rows($sql);
      if ($cek >0 ) {
          if (@$_SESSION['level']=="guru") {            
                @$_SESSION['nama']=$data['nama'];
                @$_SESSION['mapel']=$data['kd_mapel'];
               
                header("location: data_nilai.php");
          }else{
                @$_SESSION['nis']=$data['nis'];
                @$_SESSION['nama']=$data['nama'];
                header("location: nilai_siswa.php");
          }   
      }else{
        ?><script type="text/javascript">alert("Login gagal");</script><?php
      }
      
  }
  


?>
     </div>
   </div>
</body>
</html>
<?php
}
?>