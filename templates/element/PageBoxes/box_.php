<div class="box<?= (!empty($widget->page_text->picture) ? ' has-image' : NULL) ?>">
    <?php
    if(!empty($widget->page_text->picture)):
        echo $this->element('PageBoxes/_image', ['widget' => $widget]);
    endif;
    ?>
    <div class="inner <?= !empty($widget->page_text->more_btn_text) ? 'has-button' : '' ?>">
        <?php
        if(!empty($widget->page_text->title)) {
            echo $this->Html->tag('h2', (!empty($widget->page_text->url) ? $this->Html->link($widget->page_text->title, $widget->page_text->url, ['escape' => FALSE]) : $widget->page_text->title));
        }

        echo $widget->page_text->content;

        if(!empty($widget->page_text->url && $widget->page_text->more_btn_text)) {
            echo $this->Html->tag('div',
                $this->Html->link(
                    $this->Html->tag('span', (!empty($widget->page_text->more_btn_text) ? $widget->page_text->more_btn_text : __('Tovább'))),
                    $widget->page_text->url,
                    [
                        'class'  => 'more',
                        'escape' => FALSE,
                        'target' => (substr_count($widget->page_text->url, 'http') > 0 ? '_blank' : FALSE),
                    ]
                ), ['class' => 'btn-wrapper']);
        }
        ?>
    </div>
</div>