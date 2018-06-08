<!DOCTYPE html>
<html>
<head>
	<title>Панель управление</title>
	<?php include_once(D.'backend/template/external.php'); ?>
</head>
<body>
<div class="bg-login">
	<div class="admin-form">
		<h1>Панель управление</h1>
		<?php if(isset($errors) && is_array($errors)):?>
			<?php foreach ($errors as $error): ?>
				<p class="errors"><?php echo $error; ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
		<form method="POST"><br>
			<input type="text" name="admin_login" placeholder="Логин"><br>
			<input type="password" name="admin_password" placeholder="Пароль"><br>
			<button type="submit" name="admin-button">Вход</button><br>
		</form>
	</div>
</div>
</body>
</html>