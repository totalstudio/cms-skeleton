<?php
/** @var \App\View\AppView $this */
if(!empty($widget->special['title'])):
?>
<div class="row">
    <div class="col-12 title-block">
        <h2><?= $widget->special['title'] ?? '' ?></h2>
    </div>
</div>
<?php
endif;
?>

<div class="owl-testimonials owl-carousel">
    <?php
    if (!empty($testimonials)) {
        foreach ($testimonials as $row) {
            ?>
            <div class="testimonial-item">
                <div class="wrap">
                    <?php
                    if(!empty($row->picture)):
                    ?>
                        <div class="testimonial-image">
                            <?= $this->TsHtml->image($row, ['size' => 'mini', 'autoParams' => true]); ?>
                        </div>
                    <?php
                    endif;
                    ?>

                    <div class="testimonial-text">
                        <?= $row->text ?>
                    </div>
                    <div class="testimonial-writer">
                        <?= $row->writer; ?>
                    </div>
                    <?php
                    if(!empty($row->second_line)):
                    ?>
                    <p class="testimonial-job">
                        <?= $row->second_line; ?>
                    </p>
                        <?php
                    endif;
                        ?>

                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
