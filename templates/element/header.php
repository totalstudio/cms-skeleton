<?php
/** @var \App\View\AppView $this */
?>
<header class="header-fixed">
    <div class="container">
        <div class="row">
            <div class="col-auto text-start align-self-center">
                <div class="logo-holder">
                    <a href="/">First Blog</a>
                </div>
            </div>
            <div class="col-auto d-xl-none text-end align-self-center navbar-light">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> </span>
                </button>
            </div>
            <div class="col-12 col-xl align-self-center text-end ">
                <nav class="navbar navbar-expand-xl d-inline-block p-0">
                    <div class="collapse navbar-collapse" id="navbar">
                        <?= $this->cell('TSCms.Studio::menu') ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
