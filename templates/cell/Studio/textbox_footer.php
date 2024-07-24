<div class="text-box">
<?php
/**
 *  Copyright (C) 2017  Total Studio Kft.
 *  Author: Tamás Gergely
 *  This file is a part of Studio CMS engine.
 *
 */

if ($adminEdit) {

    /** @var \App\View\AppView $this */
    /** @var \TSCms\Model\Entity\PageText $text */
    echo $this->TsForm->create(
        $text,
        [
            'url'      => ['controller' => 'PageTexts', 'action' => 'edit', $text->id, 'prefix' => 'Admin'],
            'id'       => 'form' . $text->id,
            'onsubmit' => 'STUDIO.submitForm({form : "#form' . $text->id . '", onlyCheck : false, callback:function(){}}); return false;'
        ]
    );

    echo $this->TsForm->input('_locale', FALSE, ['type' => 'hidden', 'value' => $lng]);

    echo $this->TsForm->inlineWysiwyg(
        'save[' . $text->id . '][title]',
        $text->title,
        ['tag' => 'div', 'class' => 'footer-title'],
        ['toolbar1' => 'save undo redo', 'menubar' => false]
    );
    echo $this->TsForm->inlineWysiwyg(
        'save[' . $text->id . '][content]',
        $text->content
    );

    if (!empty($text->url)) echo $this->Html->link((!empty($text->more_btn_text) ? $text->more_btn_text : __('Tovább')), $text->url, ['class' => 'btn more']);
    echo $this->Form->end();
} else {
    if(!empty($text->title))echo $this->Html->tag('div', $text->title, ['class' => 'footer-title']);
    echo $text->content;
    if (!empty($text->url)) echo $this->Html->link((!empty($text->more_btn_text) ? $text->more_btn_text : __('Tovább')), $text->url, ['class' => 'btn more']);
}
?>
</div>