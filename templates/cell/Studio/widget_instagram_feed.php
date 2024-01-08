<div class="row instagram-feed">
    <?php
    /** @var \App\View\AppView $this */
    foreach ($data->data as $i => $post) {
        if($i == $limit) break;
        echo '<a href="'.$post->permalink.'" rel="nofollow" target = "_blank" class="col-6 col-md-4 col-xl-3">
            <img src="'.$post->media_url.'"  alt="' . $post->caption . '" class="w-100 h-100"/>
            </a>';
    }
    ?>
</div>
