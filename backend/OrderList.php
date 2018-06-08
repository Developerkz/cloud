<!DOCTYPE html>
<html>
<head>
	<title>Заявки | Панель управление</title>
	<?php include_once(D.'backend/template/external.php'); ?>
</head>
<body>


<div class="column-3" style="height: 100%;">
	<?php $getPage = 'order'; ?>
	<?php include_once(D.'backend/template/sidebar.php'); ?>
</div>


<div class="column-9" style="height: 100%;">
	<?php include_once(D.'backend/template/header.php'); ?>
	<div class="top-container"></div>
	<div class="content">

		<div class="list-title">
			<h2>Заявки</h2>
			<div class="clear"></div>
		</div>

		<?php foreach ($get as $order): ?>

				<div class="file-item">
					<div class="column-1 file-icon">
						<i class="fa fa-id-card"></i>
					</div>
					<div class="column-6">
						<h3><?php echo $order["username"];?></h3>
						<p style="font-size: 15px"><b>Qiwi: </b><?php echo $order["num"];?></p>
					</div>
					<div class="column-1">
						<p><b>Сумма: </b><?php echo $order["cvv"];?> руб.</p>
					</div>
					<div class="column-4 cntr">
						<p><b>Статус: </b><?php if($order["status"] == 0):?><span style="display:inline-block;color:red"> Не оплачен </span><?php else:?><span style="display:inline-block;color:green"> Оплачено </span><?php endif; ?></p>
						<a href="<?php uri();?>admin/order-pay/<?php echo $order["id"]; ?>" style="color:#0062FF">(Нажмите сюда после выплаты)</a>
					</div>
					<div class="clear"></div>
				</div>
	
		<?php endforeach; ?>

	</div>

	<?php include_once(D.'backend/template/footer.php'); ?>
</div>


<?php include_once(D.'backend/template/scripts.php'); ?>
</body>
</html>