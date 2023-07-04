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
		<div class="col-md-4">
			<h3 class="page-header">Bem-vindo <a href="welcomeadmin">Admin</a> </h3>
			<h4 class="page-header">Adicione novo docente </h4>
			<?php
			include( "database.php" );
			?>
			<form action="" method="POST" name="update">


				<div class="form-group">
					<label for="Faculty Name">Nome - docente : <span style="color: #ff0000;">*</span></label>
					<input type="text" name="fname" class="form-control" id="fname" required>
				</div>

				<div class="form-group">
					<label for="Father Name">Nome do pai :<span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="faname" name="faname" required>
				</div>

				<div class="form-group">
					<label for="Address">Endereço : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" name="addrs" required id="addrs">
				</div>

				<div class="form-group">
					<label for="Gender">Genêro : &nbsp;</label>
					<input type="radio" name="gender" value="Male" id="Gender_0" checked> Masculino
					<input type="radio" name="gender" value="Female" id="Gender_1"> Feminino
				</div>

				<div class="form-group">
					<label for="PhoneNumber">Celular : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="phno" name="phno" maxlength="10" required>
				</div>

				<div class="form-group">
					<label for="Joining Date">Data de entrada : <span style="color: #ff0000;">*</span></label>
					<input type="date" class="form-control" id="jdate" name="jdate" placeholder="YYYY-MM-DD" required>
				</div>

				<div class="form-group">
					<label for="City">Cidade : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="city" name="city" required>
				</div>

				<div class="form-group">
					<label for="Password">Senha :<span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" name="pass" required id="pass">
				</div>

				<div class="form-group">
					<input type="submit" value="Add New Faculty" name="addnewfaculty" class="btn btn-primary">
				</div>

			</form>
			<?php
			//}
			?>

			<?php
			if ( isset( $_POST[ 'addnewfaculty' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempphno = $_POST[ 'phno' ];
				$tempjdate = $_POST[ 'jdate' ];
				$tempcity = $_POST[ 'city' ];
				$temppass = $_POST[ 'pass' ];
				// adding new faculty
				$sql = "insert facutlytable (FName, FaName, Addrs, Gender, JDate, City, Pass, PhNo) values ('$tempfname', '$tempfaname', '$tempaddrs','$tempgender', '$tempjdate', '$tempcity' , '$temppass','$tempphno')";

				if ( mysqli_query( $connect, $sql ) ) {

					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> New Faculty Addded Faculty ID is : <strong>" . mysqli_insert_id( $connect ) . "</strong></div>";

				} else {
					//error message if SQL query Fails
					echo "<br><Strong>New Faculty Adding Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//close the connection
				mysqli_close( $connect );

			}


			?>
		</div>
	</div>

	<?php include('allfoot.php'); ?>