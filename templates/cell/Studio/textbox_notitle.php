<div class="text-box">
<?php
/** @var \App\View\AppView $this */
if($adminEdit) {
    echo $this->TsForm->create(
        $text,
        [
            'url' => ['controller' => 'PageTexts', 'action' => 'edit', $text->id, 'prefix' => 'Admin'],
            'id' => 'form'.$text->id,
            'onsubmit' => 'STUDIO.submitForm({form : "#form' . $text->id . '", onlyCheck : false, callback: function(){}}); return false;'
        ]
    );

    echo $this->TsForm->input('_locale', false, ['type' => 'hidden', 'value' => $lng]);
    echo $this->TsForm->inlineWysiwyg(
        'save[' . $text->id . '][content]',
        $text->content
    );
    if (!empty($text->url)) echo $this->Html->link((!empty($text->more_btn_text) ? $text->more_btn_text : __('Tovább')), $text->url, ['class' => 'btn more']);
    echo $this->Form->end();
}else{
    echo $text->content;
    if (!empty($text->url)) echo $this->Html->link((!empty($text->more_btn_text) ? $text->more_btn_text : __('Tovább')), $text->url, ['class' => 'btn more']);
}
?>
</div>