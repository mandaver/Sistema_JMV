<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
$sEno = $_SESSION[ "seno" ];
?>
<?php include('studenthead.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<!--Welcome page for student-->
			<h3> Bem-Vindo <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></h3>

			<a href="mydetailsstudent.php?myds=<?php echo $userid;  ?>"> <button type="submit" class="btn btn-primary" title="My Details">Meus Dados</button></a>
			<a href="takeexam"> <button  href="" type="submit" class="btn btn-primary" >Fazer Exame</button></a>

			<a href="viewresult.php?seno=<?php echo $sEno;  ?>"> <button  href="" type="submit" class="btn btn-primary">Ver Resultado</button> </a>
			<a href="viewquery.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-primary">Ver consulta</button> </a>

			<a href="askquery.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-primary">Perguntar</button></a>
			<a href="logoutstudent"><button  href="" type="submit" class="btn btn-danger">Logout</button></a>

		</div>

	</div>
	<?php include('allfoot.php'); ?>