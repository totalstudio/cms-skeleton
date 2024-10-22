<?php
if(!empty($widget->special['script'])){
    $rootView->Html->scriptBlock($widget->special['script'],['block' => 'script']);
}