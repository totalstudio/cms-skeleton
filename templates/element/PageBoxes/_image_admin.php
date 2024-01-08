<?php

use Cake\Core\Configure;

if (!empty($widget->page_text->picture)) {
    $img = $widget->page_text;
    /** @var \App\View\AppView $this */
    $mainImage = $this->TsUploader->image('page_widgets.' . $widgetNum . '.page_text.picture',[
        'cropSize' => (!empty($widget->page_text->picture_default_size)? $widget->page_text->picture_default_size :  Configure::read('TSCms.PageTexts.image.picture.defaultSize')),
        'addButton' => false
    ]);
    ?>
    <div class="main-image">
        <?php
            echo $this->Html->tag('div', $mainImage, ['class' => 'image-holder']);
        ?>
    </div>
    <?php
}
?>