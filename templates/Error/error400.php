<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<!-- Error Page -->
<div class="error">
    <div class="container">
        <div class="col-xs-12 ground-color text-center">
            <div class="container-error-404">
                <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                <div class="msg">OH!<span class="triangle"></span></div>
            </div>
            <h2 class="h1"><?= h($message) ?></h2>
            <h5><?= sprintf(
                    __('A kért url %s nem található'),
                    "<strong>'{$url}'</strong>"
                ) ?></h5>
            <?=$this->Html->link(__('Vissza a nyitó oldalra'), '/', ['class' => 'back'])?>
        </div>
    </div>
</div>
<?php
echo $this->Html->scriptBlock('
function randomNum()
        {
            "use strict";
            return Math.floor(Math.random() * 9)+1;
        }
            var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector(\'.thirdDigit\'), selector2 = document.querySelector(\'.secondDigit\'),
                selector1 = document.querySelector(\'.firstDigit\');
            loop3 = setInterval(function()
            {
              "use strict";
                if(i > 40)
                {
                    clearInterval(loop3);
                    selector3.textContent = 4;
                }else
                {
                    selector3.textContent = randomNum();
                    i++;
                }
            }, time);
            loop2 = setInterval(function()
            {
              "use strict";
                if(i > 80)
                {
                    clearInterval(loop2);
                    selector2.textContent = 0;
                }else
                {
                    selector2.textContent = randomNum();
                    i++;
                }
            }, time);
            loop1 = setInterval(function()
            {
              "use strict";
                if(i > 100)
                {
                    clearInterval(loop1);
                    selector1.textContent = 4;
                }else
                {
                    selector1.textContent = randomNum();
                    i++;
                }
            }, time);
') ;
?>

