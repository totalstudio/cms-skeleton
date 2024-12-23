<?php
/** @var \App\View\AppView $this */
use Cake\Core\Configure;
$givenSize = 'tn';
if(isset($size)){
    $givenSize = $size;
}else if($widget->page_text->picture_default_size){
    $givenSize = $widget->page_text->picture_default_size;
}else{
    $givenSize = Configure::read('TSCms.PageTexts.image.picture.defaultSize');
}
if($isMobile && Configure::read('TSCms.PageTexts.image.picture.sizes')[$givenSize.'_mobile'] ?? false){
    $givenSize = $givenSize.'_mobile';
}
if (!empty($widget->page_text->picture)) {
    $img = $widget->page_text;
    $mainImage = $this->TsHtml->image(
        $img,
        [
            'size' => $givenSize,
            'alt'   => (!empty($widget->page_text->picture_title) ? $widget->page_text->picture_title : strip_tags($widget->page_text->title)),
            'title' => (!empty($widget->page_text->picture_title) ? $widget->page_text->picture_title : strip_tags($widget->page_text->title)),
            'class' => 'w-100',
            'width' =>  Configure::read('TSCms.PageTexts.image.picture.sizes.'.$givenSize.'.width'),
            'height' => Configure::read('TSCms.PageTexts.image.picture.sizes.'.$givenSize.'.height'),
            'lazy' => (empty($noLazy)?true:false)
        ]
    );
}else{
    if(!empty($placeholder)){
        $mainImage =  $placeholder;
    }

}
if(!empty($mainImage)):
?>

    <div class="main-image">
        <?php
        if (empty($widget->page_text->url) || !empty($disableLink)) {
            echo $this->Html->tag('div', $mainImage, ['class' => 'image-holder']);
        } else {
            echo $this->Html->link($mainImage, $widget->page_text->url, [
                'escape' => FALSE,
                'class'  => 'image-holder',
                'target' => (substr_count( $widget->page_text->url,'http')>0?'_blank':false)
            ]);
        }
        ?>
    </div>
    <?php
endif;
?>