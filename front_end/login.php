<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="form-page pd30 cntr">
				<h1 class="cntr">Вход</h1>
				<?php if(isset($errors) and is_array($errors)): ?>
					<?php foreach($errors as $error): ?>
						<p class="errors"><?php echo $error; ?></p>
					<?php endforeach; ?>
				<?php endif;?>
				<form method="POST">
					<input type="text" name="login_email" placeholder="Email"><br>
					<input type="password" name="login_password" placeholder="Пароль"><br><br>
					<button type="submit" name="login_button" class="btn">Отправить</button>
					
				</form>
				<p><a href="<?php uri();?>remind">Забыли пароль?</a><br><br>У вас нет аккаунт? <a href="<?php uri();?>register">Регистрация</a></p>
			</div>
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>