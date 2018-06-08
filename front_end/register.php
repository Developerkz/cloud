<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="form-page pd30 cntr">
				<h1 class="cntr">Регистрация</h1>
				<?php if(isset($errors) and is_array($errors)): ?>
					<?php foreach($errors as $error): ?>
						<p class="errors"><?php echo $error; ?></p>
					<?php endforeach; ?>
				<?php endif;?>
				<form method="POST">
					<input type="text" name="reg_name" placeholder="Имя"><br>
					<input type="text" name="reg_email" placeholder="Email"><br>
					<input type="text" name="reg_password" placeholder="Пароль"><br>
					<input type="text" name="reg_password_r" placeholder="Повторите пароль"><br><br>
					<button type="submit" name="reg_button" class="btn">Отправить</button>
					
				</form>
				<p>У вас уже есть аккаунт? <a href="<?php uri();?>login">Вход</a></p>
			</div>
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>