<?php
	wp_nav_menu([
		'menu'            => 'primary',
		'theme_location'  => 'primary',
		'container'       => 'div',
		'container_id'    => 'primary-nav',
		'container_class' => 'collapse navbar-collapse justify-content-start',
		'menu_id'         => 'main-menu',
		'menu_class'      => 'navbar-nav  main-menu',
		'depth'           => 3,
		'walker'          => new newseqo_navwalker(),
		'fallback_cb'     => 'newseqo_navwalker::fallback',
   ]);
   



