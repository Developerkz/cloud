<div class="profile-menu">
<div class="wrapper cntr">
	<ul class="cntr">
		<li><a href="<?php uri(); ?>account" <?php if($page == "account"):?> class="active" <?php endif; ?> >Загрузить</a></li>
		<li><a href="<?php uri(); ?>account/score" <?php if($page == "score"):?> class="active" <?php endif; ?>>Мой баланс</a></li>
		<li><a href="<?php uri(); ?>account/files" <?php if($page == "files"):?> class="active" <?php endif; ?>>Мои файлы</a></li>
		<li><a href="<?php uri(); ?>account/traffic" <?php if($page == "traffic"):?> class="active" <?php endif; ?>>Тарифы</a></li>
		<li><a href="<?php uri(); ?>account/statistics" <?php if($page == "statistics"):?> class="active" <?php endif; ?>>Статистика</a></li>
		<li><a href="<?php uri(); ?>logout">Выход</a></li>
		<div class="clear"></div>
	</ul>

</div>
</div>