<?php
/** @var \App\View\AppView $this */

use Cake\Core\Configure;

?>
<div class="carousel slide carousel-fade" id="slider"  data-ride="carousel" data-bs-ride="carousel">
    <div class="carousel-inner h-100">
        <?php
        $loadVideo = '';
        $c = 0;
        if(!empty( $entity->slider_images)){
            $slider_images = $entity->slider_images;
            $indicators = '';
            $slider_number = '';
            foreach($slider_images as $i => $image){
                $c ++;
                if($image && ($image->silder_id == $slider_number)){

                    ?>
                    <div class="carousel-item  h-100 <?=($i==0?'active':'')?>">
                        <?php
                        if($image->slider_type == 'video'){
                            $loadVideo .= '
                                var myPlayer'.$image->id.'; 
                                myPlayer'.$image->id.' = jQuery("#player'.$image->id.'").YTPlayer();
                                $("#slider").on("slid.bs.carousel", function () {
     
                                    if(myPlayer'.$image->id.'.closest(".carousel-item").hasClass("active")){
                                        myPlayer'.$image->id.'.YTPPlay();
                                    }else{
                                        myPlayer'.$image->id.'.YTPPause();
                                    }
                                });
                                ';
                            ?>

                            <div class="video-container h-100" id="video<?=$image->id?>">
                            </div>
                            <div class="player" id="player<?=$image->id?>"
                                 data-property="{videoURL:'https://www.youtube.com/watch?v=<?=$image->type_attributes?>',containment:'#video<?=$image->id?>', playOnlyIfVisible:false, showControls:false, autoPlay:false, loop:true, mute:true, startAt:0, addRaster:true, quality:'1280'}">
                            </div>
                            <?php
                        }else{
                            if(!empty($image->picture)){
                                $size = ($isMobile ? 'tn' : 'normal');
                                if($i==0) {
                                    $this->start('preload');
                                        echo $this->TsHtml->preloadImages([$image->{$size.'_picture'}]);
                                    $this->end();
                                }
                                ?>

                                <div class="image-container">
                                    <?= $this->TsHtml->image($image, [
                                        'size' => $size,
                                        'autoParams' => true,
                                        'lazy' => false,
                                        'alt' => strip_tags($image->title)]) ?>
                                </div>

                                <?php
                            }
                        }
                        ?>

                        <div class=" carousel-caption ">
                            <?php
                            if(!empty($image->title)):
                                echo $this->Html->tag(
                                    ($i==0?'h1':'h2'),
                                    nl2br($image->title),
                                    ['style' => (!empty($image->title_color)?'color:'. $image->title_color.'!important':false)]
                                );
                            endif;
                            if(!empty($image->description)):
                                ?>

                                <div class="carousel-caption-lead" <?=(!empty($image->description_color)?'style="color:'.$image->description_color.'!important"':false)?>>
                                    <?=$image->description?>
                                </div>
                            <?php
                            endif;
                            ?>
                            <?=(!empty($image->url)?$this->Html->link(
                                    $this->Html->tag('span',(!empty($image->button_text)?$image->button_text:__( 'Tovább'))),
                                    $image->url,
                                    ['class' => 'btn btn-primary', 'escape' => false]
                            ):'')?>
                        </div>

                    </div>
                    <?php
                    $indicators .= $this->Html->tag('li','', ['data-target' => '#slider', 'data-bs-target' => '#slider', 'data-bs-slide-to' => $i, 'data-slide-to' => $i, 'class' => ($i==0?'active':false)]);
                }
            }
            if($indicators){
                echo $this->Html->tag('ol', $indicators, ['class' => 'carousel-indicators']);
            }
        }
        if(!empty($loadVideo)){
            $rootView->Html->script('/lib/mb-ytplayer/3_3_9/dist/jquery.mb.YTPlayer.min.js', ['block' => 'script']);
            $rootView->Html->scriptBlock($loadVideo, ['block' => 'script']);
        }
        ?>
    </div>


    <?php
    if($c>1):
        ?>
        <a class="carousel-control-prev" href="#slider" data-slide="prev" data-bs-slide="prev" data-bs-target="#slider">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slider" data-slide="next" data-bs-slide="next" data-bs-target="#slider">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </a>
    <?php
    endif;
    ?>
</div>

