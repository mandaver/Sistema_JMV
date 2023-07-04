<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('studenthead.php'); ?>



<div class="container">
	<div class="row">
		<div class="col-md-5">

			<h3> Bem-Vindo <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			include( 'database.php' );
			$varid = $_REQUEST[ 'myds' ];
			//selecting data from student table
			$sql = "select * from  studenttable where Eid='$varid'";
			$result = mysqli_query( $connect, $sql );
			//loop below will print details of a particular student
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<fieldset>
				<legend>Meus Dados</legend>
				<form action="" method="POST" name="update">
					<table class="table table-hover">

						<tr>
							<td><strong>Número de Inscrição : </strong>
							</td>
							<td>
								<?php echo $row['Eno']; ?>
							</td>

						</tr>
						<tr>
							<td><strong>Nome :</strong> </td>
							<td>
								<?php echo $row['FName']; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Sobrenome :</strong> </td>
							<td>
								<?php echo $row['LName']; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Nome do Pai :</strong> </td>
							<td>
								<?PHP echo $row['FaName'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Endereço : </strong>
							</td>
							<td>
								<?PHP echo $row['Addrs'];?> </td>
						</tr>
						<tr>
							<td><strong>Gênero :</strong>
							</td>
							<td>
								<?PHP echo $row['Gender'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Curso : </strong>
							</td>
							<td>
								<?PHP echo $row['Course'];?>
							</td>
						</tr>
						<tr>
							<td><strong>D.O.B. : </strong> </td>
							<td>
								<?PHP echo $row['DOB'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Número de Telefone :</strong>
							</td>
							<td>
								<?PHP echo $row['PhNo'];?> </td>
						</tr>
						<tr>
							<td><strong>Email : </strong>
							</td>
							<td>
								<?PHP echo $row['Eid'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Senha :</strong> </td>
							<td>
								<?PHP echo $row['Pass'];?>
							</td>
						</tr>

					</table>
				</form>
			</fieldset>
			<?php
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>