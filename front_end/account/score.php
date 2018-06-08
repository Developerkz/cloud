<!DOCTYPE html>
<html>
<head>
	<title>Мой баланс</title>

	<?php include_once(D.'front_end/template/external.php'); ?>

</head>
<body>

<?php include_once(D.'front_end/template/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
		<div class="cntr pd30"><h1><?php echo $data["email"]; ?></h1></div>
		<?php include_once(D.'front_end/template/profile-menu.php'); ?>

			<div class="main-page pd30 form-page">
				
						<h2>Ваш баланс: <?php echo $score; ?> руб.</h2>
						<p>Минимальный вывод  100 рублей, выплаты в течении 5 рабочих дней</p>
						<?php if(isset($errors) and is_array($errors)): ?>
							<?php foreach($errors as $error): ?>
								<p class="errors"><?php echo $error; ?></p>
							<?php endforeach; ?>
						<?php endif;?>
						<form method="POST">
							<input type="text" name="payment_name" placeholder="Введите Qiwi кошелек"><br>
							<input type="text" name="payment_number" placeholder="Сумма вывода"><br>
<!--						<input type="text" name="payment_date" placeholder="05/20"><br>
							<input type="text" name="payment_cvv" placeholder="111"><br>-->
							<button type="submit" name="payment_button">Отправить</button> 
						</form>
				
			</div>

			
		</div>
	</div>
</section>


<?php include_once(D.'front_end/template/footer.php'); ?>
<?php include_once(D.'front_end/template/scripts.php'); ?>
</body>
</html>