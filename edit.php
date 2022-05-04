<?php include('../../../protect.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>CHAME O MOTORISTA - CUPONS</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
	<img src="../../../logo.png" width="27" height="35" alt="" class="rounded-circle">
  CHAME O MOTORISTA </a>
  <a href="../../../read.php" class="btn btn-success btn-lg" role="button" aria-disabled="true">VOLTAR</a>
    
</nav>
<!-- FINAL MENU -->

<!-- ALERTA -->
<div class="alert alert-primary" role="alert">
Bem vindo ao Painel, Caso queira sair <a href="../../../logout.php" class="alert-link">clique aqui</a>. para desconectar do sistema.
</div>
<!-- FINAL ALERTA -->

<?php

include "conexao.php";

    // if the form's update button is clicked, we need to procss the form
    	if (isset($_POST['update'])) {
		$status_cupom = $_POST['status_cupom'];
		$usado_onde = $_POST['usado_onde'];
        $iTripId = $_POST['iTripId'];

		// write the update query
		$sql = "UPDATE `trips` SET `status_cupom`='$status_cupom',`usado_onde`='$usado_onde' WHERE `iTripId`='$iTripId'";
     
		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}

	}
    

    // if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$iTripId = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `trips` WHERE `iTripId`='$iTripId'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$status_cupom = $row['status_cupom'];
			$usado_onde = $row['usado_onde'];
			$iTripId = $row['iTripId'];
		}
    }
}
	?>

    <div class="container">
	<div class="row">
    <h1>CUPOM - <?php echo $vRideNo; ?></h1>
    </div>
    <div class="row flex-center">
        <div class="form-control">
            <form action="" method="post">
		    <fieldset>
            <div class="form-group">
		    <label>STATUS DO CUPOM</label><br>
		    <input type="text" name="status_cupom" value="<?php echo $status_cupom; ?>">
            <div class="form-group"><br>
            <label>CUPOM USADO ONDE?</label><br>
		    <input type="text" name="usado_onde" value="<?php echo $usado_onde; ?>">
            </div>
		    <input class="btn btn-primary btn-lg" type="submit" value="Salvar" name="update">
		  </fieldset>
		    </form>
        </div>
    </div>
</div>
</html>
