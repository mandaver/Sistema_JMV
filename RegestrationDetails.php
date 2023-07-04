<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}
$userid = $_SESSION[ "umail" ];
?>
<?php include('adminhead.php'); ?>
<div class="container">
	<div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			$deleteid = $_GET[ 'deleteid' ];

			$sql = "DELETE FROM `registrationtable` WHERE RegID = $deleteid";

			if ( mysqli_query( $connect, $sql ) ) {
				echo "
				<br><br>
				<div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Detalhes do Registro Deletada.
				</div>
				";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Atualização de Detalhes de Registro Falhou. Tente de novo</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			//close the connection
			mysqli_close( $connect );
		}
		?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="page-header">Bem-Vindo <a href="welcomeadmin">Admin</a> </h3>
			<?php
			include( "database.php" );
			$sql = "select * from  registrationtable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Detalhes dE Registro</h2>";
			echo "<table class='table table-striped' style='width:100%'>
			<tr>
			<th>Reg ID</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Nome do Pai</th>
			<th>Curso</th>
			<th>DOB</th>
			<th>Endereço</th>
			<th>Gênero</th>
			<th>Número do Telefone</th>
			<th>Email</th>
			<th>Senha</th>
			<th>Editar</th>
			<th>Deletar</th>
			<th>Confirmação de Afirmação</th>

			<tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $row['RegID'];?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['LName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Course'];?>
				</td>
				<td>
					<?PHP echo $row['DOB'];?>
				</td>
				<td>
					<?PHP echo $row['Addrs'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				<td>
					<?PHP echo $row['Eid'];?>
				</td>
				<td>
					<?PHP echo $row['Pass'];?>
				</td>
				<td><a href="UpdateRegestrationDetails.php?regid=<?PHP echo $row['RegID'];?>"><input type="button" Value="Edit" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="RegestrationDetails.php?deleteid=<?PHP echo $row['RegID'];?>"><input type="button" Value="Delete" class="btn btn-info btn-sm"></a>
				</td>
				<td><a href="addConfirm.php?addnewRegId=<?php echo $row['RegID']; ?>"><input type="button" Value="Yes" class="btn btn-info btn-sm"></a>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>

	<?php include('allfoot.php'); ?>