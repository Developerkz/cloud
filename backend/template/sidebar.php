<div class="sidebar">
	<div class="header-logo">
		<a href=""><i class="fa fa-cloud"></i> Cloud</a>
	</div>
	<div class="left-menu">
		<ul>
			<li><a <?php if($getPage == "file"): ?> class="active" <?php endif;?>  href="<?php uri(); ?>admin/panel"><i class="fa fa-file"></i>&nbsp;&nbsp;&nbsp;&nbsp;Файлы</a></li>
			<li><a <?php if($getPage == "user"): ?> class="active" <?php endif;?> href="<?php uri(); ?>admin/user-list"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Пользователи</a></li>
			<li><a <?php if($getPage == "order"): ?> class="active" <?php endif;?> href="<?php uri(); ?>admin/order-list"><i class="fa fa-id-card"></i>&nbsp;&nbsp;&nbsp;Заявки</a></li>
			<li><a <?php if($getPage == "news"): ?> class="active" <?php endif;?> href="<?php uri(); ?>admin/news-list"><i class="fa fa-newspaper-o"></i>&nbsp;&nbsp;&nbsp;Новости</a></li>
			<li><a <?php if($getPage == "package"): ?> class="active" <?php endif;?> href="<?php uri(); ?>admin/package-list"><i class="fa fa-feed"></i>&nbsp;&nbsp;&nbsp;&nbsp;Тарифы</a></li>
		</ul>
	</div>
</div>