<?php
// require'as iterpia visa process.php file'a i index.php
require('./process.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>

<body>
	<?php if(!$showSuccess): ?>

	<div class="container">

		<div class="header">

			<h1>PARAŠYKITE MUMS ŽINUTĘ</h1>

		</div>

		<form action="" method='post' autocomplete="off">

			<div class="input-group"> 

				<input value="<?php echo $name?>" placeholder="Jūsų vardas" type="text" name="name" id="name">
				<?php if(!empty($nameErr)): ?>
				<p class="error-alert"><?php echo $nameErr?></p>
				<!-- endif uzdaro if'a -->
				<?php endif;?>

			</div>

			<div class="flexContainer">

				<div class="input-group halfWidth">
					<input value="<?php echo $email?>" placeholder="El. paštas" type="text" name="email" id="email">
					<?php if(!empty($emailErr)): ?>
					<p class="error-alert"><?php echo $emailErr?></p>
					<?php endif;?>
				</div>

				<div class="input-group halfWidth">
					<input value="<?php echo $phoneNumber?>" placeholder="Telefono numeris" type="text" name="phoneNumber" id="phoneNumber">
					<?php if(!empty($phoneNumberErr)): ?>
					<p class="error-alert"><?php echo $phoneNumberErr?></p>
					<?php endif;?>
				</div>

			</div>

			<h4>NORIU SUSISIEKTI SU:</h4>

			<div class="input-group radio-input "><br>
				<!-- for susijes su id -->
				<div>

					<input type="radio" name="department" id="sales" value='Pardavimų skyrius' <?php echo $department === "Pardavimų skyrius" ?"checked": "" ?>>
					<label for="sales">Pardavimų skyriumi</label>

				</div>

				<div>

					<input type="radio" name="department" id="administration" value='Administracija' <?php echo $department === "Administracija" ?"checked": "" ?>>
					<label for="administration">Administracija</label>

				</div>

				<div>

					<input type="radio" name="department" id="customerDepartment" value='Klientų aptarnavimo skyrius' <?php echo $department === "Klientų aptarnavimo skyrius" ?"checked": "" ?>>
					<label for="customerDepartment">Klientų aptarnavimo skyriumi</label> 

				</div>

				<?php if(!empty($departmentErr)): ?>
				<p class="error-alert"><?php echo $departmentErr?></p>
				<?php endif;?>

			</div>

			<div class="input-group">

				<select name="subject" id="subject">

					<!-- disabled -->
					<option value="">PASIRINKITE TEMĄ</option>
					<option value="Problemos sprendimas">Problemos sprendimas</option>
					<option value="Prekės grąžinimas">Prekės grąžinimas</option>

				</select>

				<?php if(!empty($subjectErr)): ?>
				<p class="error-alert"><?php echo $subjectErr?></p>
				<?php endif;?>

			</div>

			<div class="input-group">

				<textarea placeholder="Jūsų žinutė..." name="comment" id="comment" cols="30" rows="3"></textarea>
				<?php if(!empty($commentErr)): ?>
				<p class="error-alert"><?php echo $commentErr?></p>
				<?php endif;?>

			</div>

			<div class="displayFlex">

				<button type='submit'>SIŲSTI</button>

			</div>

		</form>

	</div>

	<?php endif;?>
	<?php if($showSuccess): ?>

	<div class="success_container">

		<h1>Dėkojame už žinutę, <?php echo $name?></h1>

		<div class="success_message_container">

			<p class="success_message">Jūsų pateikta informacija:<br>
				Vardas: <?php echo $name?><br>
				El. pašto adresas: <?php echo $email?><br>
				Telefono numeris: <?php echo $phoneNumber?><br>
				Skirta: <?php echo $department?><br>
				Tema: <?php echo $subject?><br>
				Žinutė:	<?php echo $comment?>
			</p>

		</div>

	</div>

	<?php endif;?>

</body>

</html>





