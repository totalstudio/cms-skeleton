<?php
/** @var \App\View\AppView $this */
if ($widget->special['video_title'] && !empty($widget->special['video_title'])) {
    echo $this->Html->tag('h2', $widget->special['video_title'], ['class'=>'mt-3']);
}
echo $this->TsHtml->youtubeVideo($widget->special['video']??null, ['lazyLoad' => TRUE]);
