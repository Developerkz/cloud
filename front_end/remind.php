<!DOCTYPE html>
<html>
<head>
	<title>Вспомнить пароль</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="form-page pd30 cntr">
				<div class="pd30"></div>

				<h1 class="cntr">Вспомнить пароль</h1>
				<?php if(isset($errors) and is_array($errors)): ?>
					<?php foreach($errors as $error): ?>
						<p class="errors"><?php echo $error; ?></p>
					<?php endforeach; ?>
				<?php endif;?>

				<form method="POST">
					<input type="text" name="remind_email" placeholder="Email" 
					<?php if(isset($email) && User::checkEmail($email)): echo 'value="'.$email.'"'; endif; ?>><br><br><br>
					<button type="submit" name="remind_button" class="btn">Отправить</button>
				</form>

				<div class="pd30"></div>
			</div>
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>