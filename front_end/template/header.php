<header>
	<div class="header">
		<div class="wrapper">
			<div class="header-logo  op-left">
				<a href="<?php uri(); ?>">
					<i class="fa fa-cloud" aria-hidden="true"></i>
				</a>
			</div>
			<div class="header-menu op-left">
				<a href="<?php uri(); ?>">Главная</a>
				<a href="<?php uri(); ?>news">Новости</a>
			</div>
			<div class="header-user op-right">
				<?php if(isset($_SESSION["user"])): ?>
					<?php $data = User::getDataByID($_SESSION["user"]); ?>
					<a href="<?php uri(); ?>account"><?php echo $data["name"]; ?></a><span style="color:#fff">Ваш баланс: <?php echo File::getBounce(); ?> руб</span>
				<?php else: ?>
					<a class="inline login" href="<?php uri(); ?>login">Войти</a>
					<a class="inline register" href="<?php uri(); ?>register">Регистрация</a>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>

		<div class="mobile-header">
			<i class="fa fa-bars"></i>
			<ul>
				<li><a href="<?php uri(); ?>">Главная</a></li>
				<li><a href="<?php uri(); ?>news">Новости</a></li>
				<li><a href="<?php uri(); ?>login">Войти</a></a></li>
				<li><a href="<?php uri(); ?>register">Регистрация</a></li>
			</ul>
		</div>
	</div>

	
</header>