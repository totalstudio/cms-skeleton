<?php
if(!empty($text->title))echo $this->Html->tag('h2', $text->title);
echo $text->content;
if (!empty($text->url)) echo $this->Html->link((!empty($text->more_btn_text) ? $text->more_btn_text : __('Tovább')), $text->url, ['class' => 'btn more']);
