<div class="box<?=(!empty($widget->page_text->picture)?' has-image admin':null)?>">
    <?php
    if(!empty($widget->page_text->picture)):
        echo $this->element('PageBoxes/_image_admin', ['widget' => $widget, 'widgetNum' => $widgetNum]);
    endif;
    ?>
    <div class="inner <?= !empty($widget->page_text->more_btn_text) ? 'has-button' : '' ?>">
        <?php
        if (!empty($widget->page_text->title)) {
            echo $this->TsForm->inlineWysiwyg(
                    'page_widgets[' . $widgetNum . '][page_text][title]',
                    $widget->page_text->title,
                    ['tag' => 'h2'],
                    ['toolbar1' => 'save undo redo',  'forced_root_block' => false, 'menubar' => false]
            );
            if(!empty($widget->page_text->url)) {
                echo $this->Html->link($this->Html->tag('span', '', ['class' => 'fas fa-link']), $widget->page_text->url, [
                    'class' => 'follow-link position-absolute',
                    'escape' => FALSE
                ]);
            }
        }

        echo $this->TsForm->inlineWysiwyg('page_widgets[' . $widgetNum . '][page_text][content]', $widget->page_text->content);

        if (!empty($widget->page_text->url) && !empty($widget->page_text->more_btn_text)) {
            echo $this->Html->tag('div',
                $this->Html->link(
                    $this->Html->tag('span',(!empty($widget->page_text->more_btn_text) ? $widget->page_text->more_btn_text : __('Tovább'))) ,
                    $widget->page_text->url,
                    [
                        'class'  => 'more',
                        'escape' => FALSE
                    ]
                ), ['class' => 'btn-wrapper']);
        }
        ?>
    </div>
</div>
