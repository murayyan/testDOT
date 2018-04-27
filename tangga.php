<form action="" method="POST">
	<div>
		<label>Input nilai : </label>
		<input type="text" name="inp">
	</div>
	<div><input type="submit" name="submit"></div>
</form>

<?php 
	$n = 0;
	if(isset($_POST['submit'])){
		$n = $_POST['inp'];
	}
	for( $a=$n;$a>0;$a--){
		for($b=1; $b<$a; $b++){
			echo "&nbsp&nbsp";
		}
		for($c=$n;$c>=$a;$c--){
			echo "#";
		}
		echo "<br>";
	}
	 ?>
 