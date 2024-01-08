<?php

/** @var \App\View\AppView $this */
echo $this->Tree->generate($menus,['element' => 'menu_item', 'class' => 'nav navbar-nav', 'autoPath' => $activePath])?>