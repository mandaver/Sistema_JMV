<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<!--Welcome page for faculty-->
			<h3> Bem-Vindo Docente : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>

			<a href="examDetails.php"><button  href="" type="submit" class="btn btn-primary">Detalhes do exame</button></a>
			<a href="ResultDetails.php"><button  href="" type="submit" class="btn btn-primary">Resultado</button></a>
			<a href="qureydetails.php"> <button  href="" type="submit" class="btn btn-primary">Consulta</button>
			  
			<a href="logoutfaculty"><button  href="" type="submit" class="btn btn-danger">Logout</button></a>

		</div>

	</div>
	<?php include('allfoot.php');  ?>