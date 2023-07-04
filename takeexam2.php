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
		<div class="col-md-12">

			<h3> Bem-Vindo <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			<?php
			$varid = $_GET[ 'id' ];
			include( 'database.php' );
			$sql = "select * from  studenttable where Eid='$userid'";
			$sql2 = "select * from  exam where Eid='$userid'";
			$result = mysqli_query( $connect, $sql );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<!--exam question with student detalis-->
			<fieldset>
				<legend>Detalhes do Exame</legend>
				<form action="" method="POST" name="update">
					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Número de inscrição :</strong>
								</td>
								<td>
									<?php $eno=$row['Eno'];
						echo $eno; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Nome :</strong>
								</td>
								<td>
									<?php $name=$row['FName']." ".$row['LName'];
									echo $name; ?>
								</td>
							</tr>
						</table>
					</div>

					<div class="col-md-4">
						<table>
							<tr>
								<td><strong>Curso :</strong>
								</td>
								<td>
									<?PHP $cc=$row['Course'];
											echo $cc; ?>
								</td>
							</tr>
							<tr>
								<td><strong>Solicitado :</strong>
								</td>
								<td>
									<?PHP echo $varid;?><br>
								</td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<hr>
					<div class="col-md-12">
						<span style="color: red;"><h3>Você pode testar suas habilidades em PHP com o PHP Exam </h3></span>

						<br>
						<div>
							<h4> <strong>Q1. O que significa PHP?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q1" value="o1" checked> Página inicial privada
					</label>					


							<label class="radio-inline">
					<input type="radio" name="q1" value="o2" > Processador de Hipertexto Pessoal
					</label>				




							<label class="radio-inline">
					<input type="radio" name="q1" value="o3" > PHP: pré-processador de hipertexto
					</label>
						



						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q2. Como você escreve "Hello World" em PHP</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q2" value="o1" checked > Document.Write("Hello World");
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q2" value="o2" > echo "Hello World";
					</label>
						

							<label class="radio-inline">
					<input type="radio" name="q2" value="o3" > "Hello World";
					</label>
						


						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q3. Todas as variáveis ​​em PHP começam com qual símbolo?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q3" value="o1" checked> ! 
					</label>
						



							<label class="radio-inline">
					<input type="radio" name="q3" value="o2" > &amp;
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q3" value="o3" > &#36;
					</label>
						

						</div>

						<br>
						<br>
						<div>
							<h4> <strong>Q4. Qual é a maneira correta de terminar uma instrução PHP?</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q4" value="o1" checked > .
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q4" value="o2" > New line
						
								<label class="radio-inline">
					<input type="radio" name="q4" value="o3" > ;
					</label>
						


						</div>
						<br>
						<br>
						<div>
							<h4> <strong>Q5. A sintaxe do PHP é mais semelhante a:</strong></h4>
							<label class="radio-inline">
					<input type="radio" name="q5" value="o1" checked> Perl and C
					</label>
						


							<label class="radio-inline">
					<input type="radio" name="q5" value="o2" > VBScript	
								<label class="radio-inline">
					<input type="radio" name="q5" value="o3" > JavaScript
					</label>
						

						</div>
						<br><br>
						<button type="submit" name="done" class="btn btn-primary">Terminei!</button>
					</div>
				</form>
			</fieldset>
			<?php
			}
			if ( isset( $_POST[ 'done' ] ) ) {
				$tempeid = $userid;
				$tempname = $name;
				$tempeno = $eno;
				$tempcourse = $cc;
				$tempq1 = $_POST[ 'q1' ];
				$tempq2 = $_POST[ 'q2' ];
				$tempq3 = $_POST[ 'q3' ];
				$tempq4 = $_POST[ 'q4' ];
				$tempq5 = $_POST[ 'q5' ];
				$sql = "INSERT INTO `exam`(Eno, Eid, Course, ExamName, Q1, Q2, Q3, Q4, Q5) VALUES ($tempeno,'$tempeid','$tempcourse','$varid','$tempq1','$tempq2','$tempq3','$tempq4','$tempq5')";
				if ( mysqli_query( $connect, $sql ) ) {
					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Exam Have Submited.
					</div>";
				} else {
					
					echo "<br><Strong>Exam Submitting Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				} 
				mysqli_close( $connect );
			}
			?>
		</div>
	</div>
	<?php include('allfoot.php'); ?>