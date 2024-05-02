<?php
/**
 *  Copyright (C) 2017  Total Studio Kft.
 *  Author: Tamás Gergely
 *  This file is a part of Studio CMS engine.
 *
 */

use Cake\Core\Configure;

/**
 * @var \App\View\AppView $this
 * @var \TSCms\Model\Entity\Page $entity
 */

$this->assign('title', $entity->seo_title?:$entity->title);
$this->assign('description', $entity->seo_description?:$entity->description);

$this->set('pageClass', 'page page-' . $entity->category .' '. (!empty($entity->ident) ? ('page-' . $entity->ident) : null));
$this->set('itemType', 'http://schema.org/Article');

if(!empty($entity->picture)) {
    $this->set('preloadImages', [$entity->{($size = ($isMobile ? 'tn' : 'normal')) . '_picture'}]);
}

$this->start('custom_metas');
    if(!empty($entity->ident)){
        try {
            $url = $this->Url->build([
                'controller' => 'Pages',
                'action' => 'view',
                $entity->ident,
            ], ['fullBase' => TRUE]);
        }catch(\Cake\Routing\Exception\MissingRouteException $e){
            $url = $this->Url->build([
                'controller' => 'Pages',
                'action' => 'view',
                'slug' => $entity->slug,
            ], ['fullBase' => TRUE]);
        }
    }else {
        $url = $this->Url->build([
            'controller' => 'Pages',
            'action' => 'view',
            'slug' => $entity->slug,
        ], ['fullBase' => TRUE]);
    }
echo '<link rel="canonical" href="' . $url . '">';

if ($entity->seo_noindex) {
    echo $this->TsHtml->noindex(TRUE);
}

$this->end();

$this->start('social');
echo $this->TsSocialShare->metaTags($entity->social_metas, 'article', $entity->seo_title?:$entity->title, $entity->seo_description?:$entity->description, $entity->normal_picture);
$this->end();

$this->TsHtml->langUrlGenerator($entity, ['slug']);
$firstSectionIsEmpty = true;
if (!empty($adminEdit)) {
    $this->start('adminbar');
    echo $this->Html->link(__('Oldal módosítása admin felületen'), [
        'controller' => 'Pages',
        'action'     => 'edit',
        $entity->id,
        'prefix'     => 'Admin'
    ], ['target' => '_blank']);
    echo $this->Html->link(__('Mentés'), '#this', ['onclick' => "STUDIO.submitForm({form : '#form', onlyCheck : false}); return false;"]);
    $this->end();
    echo $this->TsForm->create($entity, [
        'id' => 'form',
        'url'       => [
            'controller' => 'Pages',
            'action'     => 'edit',
            $entity->id,
            'prefix'     => 'Admin'
        ],
        'admin'     => TRUE,
        'onlycheck' => 'false'
    ]);
    echo $this->TsForm->input('_locale', FALSE, ['type' => 'hidden', 'value' => $lng]);

    $this->start('h1');
    echo $this->TsForm->inlineWysiwyg('title', $entity->title, ['tag' => 'h1'], ['toolbar1' => 'save undo redo', 'menubar' => false,  'forced_root_block' => false]);
    $this->end('h1');
    $this->start('pre');
    echo $this->TsForm->inlineWysiwyg('description', $entity->description, ['toolbar1' => 'save undo redo', 'menubar' => false,  'forced_root_block' => false]);
    $this->end('pre');

    if (!empty($entity) && $entity->has('page_widgets')) {
        $actualSection = 1;
        $sections[$actualSection] = ['type' => 'container', 'style' => FALSE];
        foreach ($entity->page_widgets as $widgetNum => $widget) {
            echo $this->TsForm->input('page_widgets.' . $widgetNum . '.id', false, ['type' => 'hidden', 'class' => 'widgetId']);

            if (($widget->widget_type == 'page_text' || $widget->widget_type == 'PageTexts') && !empty($widget->has('page_text'))) {
                $this->append('section' . $actualSection);
                echo $this->TsForm->hidden('page_widgets.' . $widgetNum . '.page_text.id');
                ?>
                <div class="<?= $widget->width_class ?> <?= $widget->style ?> <?= $widget->custom_style ?>">
                    <?php
                    try {

                        echo $this->element('PageBoxes/box_' . $widget->style . '_admin', [
                            'widget'    => $widget,
                            'widgetNum' => $widgetNum
                        ]);
                    } catch (\Cake\View\Exception\MissingElementException $e) {
                        echo $this->element('PageBoxes/box__admin', [
                            'widget'    => $widget,
                            'widgetNum' => $widgetNum
                        ]);
                    }
                    ?>
                </div>
                <?php
                $this->end();
            } elseif ($widget->widget_type == 'line_break') {
                if($actualSection == 1 && $widgetNum == 0)$firstSectionIsEmpty = false;
                $actualSection++;
                $sections[$actualSection] = ['type' => $widget->style, 'style' => $widget->custom_style, 'id' => $widget->id];
            } else {
                $this->append('section' . $actualSection);
                ?>
                <div class="<?= $widget->width_class ?> <?= $widget->style ?>  <?= $widget->custom_style ?>">
                        <?php
                        $cellData = explode('.', (!empty($widget->widget_type) ? $widget->widget_type : NULL));
                        if (empty($cellData[0]) && empty($cellData[1])) {
                            echo 'MISSING WIDGET DATA! ' . $cellData[0] . ' ' . $cellData[1];
                        } elseif (!empty($cellData[0]) && !empty($cellData[1]) && !empty($cellData[2])) {
                            try {
                                echo $this->cell($cellData[0] . '.' . $cellData[1] . '::widget' . $cellData[2], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL! ' . $cellData[0] . '.' . $cellData[1] . '::widget' . $cellData[2];
                            }
                        } elseif (!empty($cellData[0]) && !empty($cellData[1])) {
                            try {
                                echo $this->cell($cellData[0] . '::widget' . $cellData[1], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL! ' . $cellData[0] . '::widget' . $cellData[1];
                            }
                        } else {
                            try {
                                echo $this->cell('Studio::widget' . $cellData[0], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL Studio! ' . $cellData[0] . ' ' . $cellData[1];
                            }

                        }
                        ?>
                </div>
                <?php

                $this->end();
            }
        }
    }

} else {

    $this->start('h1');
    echo $this->Html->tag('h1', $entity->title);
    $this->end();
    $this->start('pre');
    echo $entity->description;
    $this->end();

    $sections = [];
    if (!empty($entity) && $entity->has('page_widgets')) {
        $actualSection = 1;
        $sections[$actualSection] = ['type' => 'container', 'style' => FALSE];
        foreach ($entity->page_widgets as $widgetNum => $widget) {

            if (($widget->widget_type == 'page_text' || $widget->widget_type == 'PageTexts') && !empty($widget->has('page_text'))) {
                $this->append('section' . $actualSection);
                ?>
                <div class="<?= $widget->width_class ?> <?= $widget->style ?> <?= $widget->custom_style ?>">
                    <?php
                    try {

                        echo $this->element('PageBoxes/box_' . $widget->style, [
                            'widget'    => $widget,
                            'widgetNum' => $widgetNum
                        ]);
                    } catch (\Cake\View\Exception\MissingElementException $e) {
                        echo $this->element('PageBoxes/box_', [
                            'widget'    => $widget,
                            'widgetNum' => $widgetNum
                        ]);
                    }
                    ?>
                </div>
                <?php
                $this->end();
            } elseif ($widget->widget_type == 'line_break') {
                 if($actualSection == 1 && $widgetNum == 0)$firstSectionIsEmpty = false;
                $actualSection++;
                $sections[$actualSection] = ['type' => $widget->style, 'style' => $widget->custom_style, 'id' => $widget->id];
            } else {
                $this->append('section' . $actualSection);
                ?>
                <div class="<?= $widget->width_class ?> <?= $widget->style ?> <?= $widget->custom_style ?>">

                        <?php
                        $cellData = explode('.', (!empty($widget->widget_type) ? $widget->widget_type : NULL));
                        if (empty($cellData[0]) && empty($cellData[1])) {
                            echo 'MISSING WIDGET DATA! ' . $cellData[0] . ' ' . $cellData[1];
                        } elseif (!empty($cellData[0]) && !empty($cellData[1]) && !empty($cellData[2])) {
                            try {
                                echo $this->cell($cellData[0] . '.' . $cellData[1] . '::widget' . $cellData[2], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL! ' . $cellData[0] . '.' . $cellData[1] . '::widget' . $cellData[2];
                            }
                        } elseif (!empty($cellData[0]) && !empty($cellData[1])) {
                            try {
                                echo $this->cell($cellData[0] . '::widget' . $cellData[1], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL! ' . $cellData[0] . '::widget' . $cellData[1];
                            }
                        } else {
                            try {
                                echo $this->cell('Studio::widget' . $cellData[0], [
                                    $this,
                                    (!empty($widget->content_id) ? $widget->content_id : NULL),
                                    $widget
                                ]);
                            } catch (\Cake\View\Exception\MissingCellException $e) {
                                echo 'MISSING WIDGET CELL Studio! ' . $cellData[0] . ' ' . $cellData[1];
                            }

                        }
                        ?>
                </div>
                <?php
                $this->end();
            }
        }
    }
}

if (!$isAjax && $entity->ident != 'home') {
    ?>
    <section class="top">
        <?php
            if($entity->picture) {
                $size = ($isMobile ? 'tn' : 'normal');
                echo $this->TsHtml->image($entity, [
                    'size' => $size,
                    'alt' => $entity->title,
                    'autoParams' => true,
                    'lazy' => false,
                    'preload' => true
                ]);
            }
        ?>
        <div class="title-holder">
            <div class="container h-100">
                <div class="row title h-100">
                    <div class="col-lg-12 align-self-center">
                            <?php
                            echo $this->fetch('h1');
                            if (!empty($entity->description)) {
                                echo $this->Html->tag('div', $this->fetch('pre'), ['class' => 'pre']);
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
if (!$this->getRequest()->getQuery('popup')) {
    //echo $this->cell('Studio::breadcrumb', [$entity->title, 'Pages', $entity->id]);
}

if(!$firstSectionIsEmpty){
    unset($sections[1]);
}

foreach ($sections as $ident => $type) {
    try {
        echo $this->element('PageSections/' . $type['type'], [
            'content' => $this->fetch('section' . $ident),
            'customStyle' => $type['style'] ?? NULL,
            'id' => (!empty($type['id']) ? 'section' . $type['id'] : NULL)
        ]);
    } catch (\Cake\View\Exception\MissingElementException $e) {
        echo $this->element('PageSections/fluid_to_container', [
            'content' => $this->fetch('section' . $ident),
            'customStyle' => $type['type'].' '.$type['style'] ?? NULL,
            'id' => (!empty($type['id']) ? 'section' . $type['id'] : NULL)
        ]);
    }
}

if (!empty($adminEdit)) {
    echo $this->Form->end();
}
?>

