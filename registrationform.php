<?php include('allhead.php'); ?>
<script>
	//javascript validation for various fildss
	function validateForm() {
		var fname = document.forms[ "register" ][ "fname" ].value;
		var lname = document.forms[ "register" ][ "lname" ].value;
		var faname = document.forms[ "register" ][ "faname" ].value;
		var course = document.forms[ "register" ][ "course" ].value;
		var dob = document.forms[ "register" ][ "dob" ].value;
		var addrs = document.forms[ "register" ][ "addrs" ].value;
		var gender = document.forms[ "register" ][ "gender" ].value;
		var phno = document.forms[ "register" ][ "phno" ].value;
		var x = document.forms[ "register" ][ "email" ].value;
		var atpos = x.indexOf( "@" );
		var dotpos = x.lastIndexOf( "." );
		var pass = document.forms[ "register" ][ "pass" ].value;
		if ( fname == null || fname == "" ) {
			alert( "Nome precisa ser preenchido" );
			return false;
		}
		if ( lname == null || lname == "" ) {
			alert( "Sobrenome precisa preenchido" );
			return false;
		}
		if ( faname == null || faname == "" ) {
			alert( "Nome do pai precisa preenchido" );
			return false;
		}
		if ( course == null || course == "" ) {
			alert( "Curso precisa preenchido" );
			return false;
		}
		if ( dob == null || dob == "" ) {
			alert( "Data de Nascimento precisa preenchido" );
			return false;
		}
		if ( addrs == null || addrs == "" ) {
			alert( "Endereço precisa preenchido" );
			return false;
		}
		if ( gender == null || gender == "" ) {
			alert( "Gênero precisa preenchido" );
			return false;
		}
		if ( phno == null || phno == "" ) {
			alert( "Telefone precisa preenchido" );
			return false;
		}
		if ( atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length ) {
			alert( "E-mail invalido" );
			return false;
		}
		if ( pass == null || pass == "" ) {
			alert( "Senha precisa preenchido" );
			return false;
		}
	}
</script>

<div class="container" style="max-width: 1200px;">
	<div class="row">
		<?PHP
		include( "database.php" );
		if ( isset( $_POST[ 'submit' ] ) ) {
			$fname = $_POST[ 'fname' ];
			$lname = $_POST[ 'lname' ];
			$faname = $_POST[ 'faname' ];
			$course = $_POST[ 'course' ];
			$dob = $_POST[ 'dob' ];
			$addrs = $_POST[ 'addrs' ];
			$gender = $_POST[ 'gender' ];
			$phno = $_POST[ 'phno' ];
			$email = $_POST[ 'email' ];
			$pass = $_POST[ 'pass' ];

			$done = "
<center>
<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
<strong><h3 style='margin-top: 10px;
margin-bottom: 10px;'> Registro feito com Sucesso.</h3>
</strong>
</div>
</center>
";

			$sql = "INSERT INTO `registrationtable` (`FName`, `LName`, `FaName`, `DOB`, `Addrs`, `Gender`, `PhNo`, `Eid`, `Pass`,`Course`) VALUES ('$fname','$lname','$faname','$dob','$addrs','$gender','$phno','$email','$pass','$course')";
			//close the connection
			mysqli_query( $connect, $sql );

			echo $done;
		}

		?>

	</div>
	<div class="row">
		<div class="col-md-12">
			<form name="register" action="" method="POST" onsubmit="return validateForm()">
				<fieldset>
					<legend>
						<h3 style="padding-top: 25px;"> Formulário de Registro </h3>
					</legend>
					<div class="control-group form-group">
						<div class="controls">
							<label>Nome: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="fname" id="fname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Sobrenome: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="lname" id="lname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Nome do Pai: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="faname" id="faname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Curso: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="course" id="course" maxlength="10">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Data de Nascimento: <span style="color: #ff0000;">*</span></label>
							<input type="Date" class="form-control" name="dob" id="dob">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Endereço: <span style="color: #ff0000;">*</span></label>
							<textarea class="form-control" name="addrs" id="addrs"></textarea>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Gênero: <span style="color: #ff0000;">*</span></label>
							<p>
								<label>
<input type="radio" name="gender" value="Male" id="Gender_0" checked>
Masculino</label>
							

								<label>
<input type="radio" name="gender" value="Female" id="Gender_1">
Feminino</label>
							
								<br>
							</p>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Número de Contato: <span style="color: #ff0000;">*</span></label>
							<input type="tel" pattern="^\d{10}$" required class="form-control" name="phno" id="phno" maxlength="10">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Email Id: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="email" id="email" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>


					<div class="control-group form-group">
						<div class="controls">
							<label>Senha: <span style="color: #ff0000;">*</span></label>
							<input type="password" class="form-control" name="pass" id="pass" maxlength="30"> <span style="color: #ff0000;">*Max 30</span>
							<p class="help-block"></p>
						</div>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Register</button>
					<button type="reset" name="reset" class="btn btn-danger">Clear</button>


				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include('allfoot.php'); ?>