<!DOCTYPE html>
<html lang="<?=$lng?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

    echo $this->Html->charset();
    
    /** @var \App\View\AppView $this */

    echo $this->TsHtml->noindex();

    echo $this->TsHtml->author();

    echo $this->TsHtml->pageTitle($this->fetch('title'));

    echo $this->TsHtml->pageDescription($this->fetch('description'));

    echo $this->TsHtml->favicon();

    echo $this->Html->css([
        'TSCms.lib/bootstrap/5_current/css/bootstrap.min.css',
    ]);

    echo $this->Html->css([
        'style'
    ]);

    echo $this->fetch('custom_metas');


    if($adminEdit) {
        echo $this->Html->css([
            'frontadmin'
        ]);
    }
    echo $this->fetch('css');

    echo $this->TsHtml->webmasterTools();

    echo $this->TsHtml->cookieConsent((!empty($analyticsCode) ? $analyticsCode : false));

    echo $this->TsHtml->getFacebookVerification();

    echo $this->TsHtml->getGoogleFont('family=Inter:wght@400;600&family=Lora:wght@500;600;700');

    echo $this->fetch('preload');

    echo $this->fetch('custom_metas');
    ?>
</head>
<body <?=(!empty($pageClass) || !empty($adminEdit) ? 'class="' . (!empty($pageClass) ? $pageClass : null) . ' ' . (!empty($adminEdit) ? 'admin' : null) . '"' : '')?>>
<?php
echo $this->TsHtml->gTagManager(true);
echo $this->TsHtml->fbPixel();
if($adminEdit) {
    echo $this->element('TSCms.adminbar');
}

echo $this->element('header');

echo $this->Flash->render();
echo $this->Html->tag('main', $this->fetch('content'), ['class' => (!empty($mainClass) ? $mainClass : '')]);
echo $this->TsHtml->initPopup(['class' => 'modal-lg']);
echo '<button id="toTop" class="d-none" title="Az oldal tetejére"><i class="fas fa-angle-up"></i></button>';
echo $this->element('footer');

echo $this->TsHtml->getFontawesome('5_13_0', ['solid-900', 'brands-400'], ['solid', 'brands']);

echo $this->Html->css([
    'TSCms.lib/fancybox/3_x/dist/jquery.fancybox.min.css',
]);

if($adminEdit) {
    $this->Html->script([
        'TSCms.lib/bootstrap-notify/bootstrap-notify.min.js',
        'TSCms.frontadmin'
    ], ['block' => 'script']);
}

echo
$this->Html->script([
    'TSCms.lib/jquery/3/jquery.min.js',
    'TSCms.lib/bootstrap/5_current/js/bootstrap.bundle.min.js',
    'TSCms.lib/fancybox/3_x/dist/jquery.fancybox.min.js',
]);

echo
$this->Html->script([
    'TSCms.studio.js',
    'TSCms.scripts.js',
]);

echo $this->fetch('script');
echo $this->fetch('consent_script');
?>

</body>
</html>