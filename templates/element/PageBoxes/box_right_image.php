<div class="box">
    <div class="row">
        <div class="col-12 col-lg-6 col-xxl-5 align-self-center">
            <div class="inner <?= (!empty($widget->page_text->more_btn_text) ? 'has-button' : '') ?>">
                <?php
                if (!empty($widget->page_text->title)) {
                    echo $this->Html->tag('h2', (!empty($widget->page_text->url) ? $this->Html->link($widget->page_text->title, $widget->page_text->url, [
                        'escape' => false
                    ]) : $widget->page_text->title));
                }

                echo $widget->page_text->content;

                if (!empty($widget->page_text->url)) {
                    echo $this->Html->tag('div',
                        $this->Html->link(
                            $this->Html->tag('span',(!empty($widget->page_text->more_btn_text) ? $widget->page_text->more_btn_text : __('Tovább'))),
                            $widget->page_text->url,
                            [
                                'class'  => 'more',
                                'escape' => false
                            ]
                        ), ['class' => 'btn-wrapper']);
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl-6 offset-xxl-1 align-self-center">
            <?= $this->element('PageBoxes/_image', ['widget' => $widget]) ?>
        </div>
    </div>
</div>