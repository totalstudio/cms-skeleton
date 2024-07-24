<div class="box <?= $widget->style ?> ">
    <div class="row">
        <div class="col-12 col-lg-6 col-xxl-6 pe-xxl-5 align-self-center">
            <?=$this->element('PageBoxes/_image_admin', ['widget' => $widget, 'widgetNum' => $widgetNum])?>
        </div>
        <div class="col-12 col-lg-6 col-xxl-6 align-self-center">
            <div class="inner <?= !empty($widget->page_text->more_btn_text) ? 'has-button' : '' ?>">
                <?php
                if (!empty($widget->page_text->title)) {
                    echo $this->TsForm->inlineWysiwyg(
                            'page_widgets[' . $widgetNum . '][page_text][title]',
                            $widget->page_text->title,
                            ['tag' => 'h2'],
                            ['toolbar1' => 'save undo redo', 'menubar' => false]
                    );

                    if(!empty($widget->page_text->url)) {
                        echo $this->Html->link($this->Html->tag('span', '', ['class' => 'fas fa-link']), $widget->page_text->url, [
                            'class' => 'follow-link position-absolute',
                            'escape' => FALSE
                        ]);
                    }
                }

                echo $this->TsForm->inlineWysiwyg('page_widgets[' . $widgetNum . '][page_text][content]', $widget->page_text->content);

                if (!empty($widget->page_text->url)) {
                    echo $this->Html->tag('div',
                        $this->Html->link(
                            $this->Html->tag('span',(!empty($widget->page_text->more_btn_text) ? $widget->page_text->more_btn_text : __('Tovább'))),
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
    </div>
</div>