<?php
// Get id from URL to delete that user
include 'connection.php';
$no = $_GET['no'];
 
// Delete user row from table based on given id
$result = mysqli_query($connect, "DELETE FROM nilai WHERE no='$no'");
 
?>
<script>
alert("Nilai Berhasil Dihapus");
location="data_nilai.php";
</script>