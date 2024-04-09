<!DOCTYPE html>
<html lang="<?= $lng ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

    echo $this->Html->charset();

    /** @var \App\View\AppView $this */
    $this->TsHtml->setSettings($ts_settings);

    echo $this->TsHtml->noindex();

    echo $this->TsHtml->author();

    echo $this->TsHtml->pageTitle($this->fetch('title'));

    echo $this->TsHtml->pageDescription($this->fetch('description'));

    $this->TsHtml->favicon();

    echo $this->Html->css([
        'TSCms./lib/bootstrap/5_current/css/bootstrap.min.css',
    ]);

    echo $this->Asset->css([
        'style',
    ]);
    if ($adminEdit) {
        $this->start('adminbar');
        echo $this->element('TSCms.adminbar');
        $this->end();

        $this->Html->css([
            'TSCms.frontadmin',
        ], ['block' => 'css']);

        $this->Html->script([
            'TSCms.frontadmin',
        ], ['block' => 'script']);
    }

    if (!empty($this->fetch('social'))) {
        echo $this->fetch('social');
    } else {
        $this->start('social');

        echo $this->TsSocialShare->metaTags(
            [],
            'website',
            $this->TsHtml->pageTitle($this->fetch('title'), '-', true),
            $this->TsHtml->pageDescription($this->fetch('description'), true),
            $this->Url->image(!empty($this->fetch('image')) ? $this->fetch('image') : 'facebook.jpg', ['fullBase' => true])
        );

        $this->end();
        echo $this->fetch('social');
    }

    echo $this->fetch('custom_metas');

    echo $this->fetch('css');

    echo $this->TsHtml->webmasterTools();

    echo $this->TsHtml->analytics((!empty($analyticsCode) ? $analyticsCode : false));

    echo $this->TsHtml->gTagManager();

    echo $this->TsMicroData->generateMicroData();

    $this->TsHtml->getFacebookVerification();

    $this->TsHtml->preloadImages($preloadImages ?? []);

    $this->TsHtml->getGoogleFont('family=Inter:wght@400;600&family=Lora:wght@500;600;700');

    echo $this->fetch('preload');

    echo $this->fetch('custom_metas');
    ?>
</head>
<body <?= (!empty($pageClass) || !empty($adminEdit) ? 'class="' . (!empty($pageClass) ? $pageClass : null) . ' ' . (!empty($adminEdit) ? 'admin' : null) . '"' : '') ?>>
<?php
echo $this->TsHtml->gTagManager(true);
echo $this->TsHtml->fbPixel();
echo $this->fetch('adminbar');

echo $this->element('header', [], ['plugin' => false]);

echo $this->Flash->render();
echo $this->Html->tag('main', $this->fetch('content'), ['class' => (!empty($mainClass) ? $mainClass : '')]);
echo $this->TsHtml->initPopup(['class' => 'modal-lg']);
echo '<button id="toTop" class="d-none" title="Az oldal tetejére"><i class="fas fa-angle-up"></i></button>';
echo $this->element('footer', [], ['plugin' => false]);

echo $this->TsHtml->getFontawesome('5_13_0', ['solid-900', 'brands-400'], ['solid', 'brands']);

echo $this->Html->css([
    'TSCms./lib/fancybox/3_x/dist/jquery.fancybox.min.css',
    'TSCms./lib/jquery_ui/1_12_1/css/jquery-ui.min.css',
]);

echo $this->Html->script([
    'TSCms./lib/jquery/3/jquery.min.js',
    'TSCms./lib/bootstrap/5_current/js/bootstrap.bundle.min.js',
    'TSCms./lib/fancybox/3_x/dist/jquery.fancybox.min.js',
]);

echo $this->Asset->script([
    'TSCms.studio.js',
    'scripts.js',
]);

echo $this->fetch('script');

?>

</body>
</html>