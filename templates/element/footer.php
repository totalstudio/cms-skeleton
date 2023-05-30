<footer>
    <div class="top pb-5 mt-5">

    <div class="container ">
        <div class="row">
            <div class="col-12 py-5 text-center align-self-center footer-logo-holder">
                <a href="/"><?= $this->Html->image('TSCms.logo.png', ['alt' => '{{brand}}', 'class' => 'footer-logo']) ?></a>
            </div>
            <div class="col-12 col-md-6">
                <?= $this->TsCell->textBox('footer_col1','textbox_footer');?>
            </div>
            <div class="col-12 col-md-3 footer-links">
                <?= $this->TsCell->textBox('footer_col2','textbox_footer');?>
            </div>
            <div class="col-12 col-md-3 footer-contact">
                <h5><?= __d('t_s_cms', 'Kapcsolat') ?></h5>
                <a href="<?=$this->TsHtml->getSetting('facebook')?>" target="_blank"><i class="fab fa-facebook"></i></a>
                <p class="mb-3 mt-3"><a href="/kapcsolat"><i class="fas fa-map-marker-alt"></i> <?= $this->TsHtml->getSetting('address') ?></a></p>
                <p class="mb-3 mt-3"><a href="tel:<?= $this->TsHtml->getSetting('phone') ?>"><i class="fas fa-mobile"></i> <?= $this->TsHtml->getSetting('phone') ?></a></p>
                <p class="mb-3 mt-3"><a href="mailto:<?= $this->TsHtml->getSetting('email') ?>"><i class="fas fa-envelope"></i> <?= $this->TsHtml->getSetting('email') ?></a></p>
            </div>
        </div>
    </div>

    </div>
    <div class="bottom py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 copyright">
                     <?= __d('t_s_cms', 'Minden jog fenntartva.') . ' ' . date('Y')?>
                </div>
                <div class="col-12 col-md-3 text-end">
                    <a href="https://www.totalstudio.hu" class="totalstudio" rel="nofollow">
                        <img src="https://www.totalstudio.hu/copyright/totalstudio_svg.php?site=totalstudio&c=FFFFFF"
                             alt="TotalStudio" title="Az oldalt a TotalStudio készítette"
                             width="150" height="30">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>