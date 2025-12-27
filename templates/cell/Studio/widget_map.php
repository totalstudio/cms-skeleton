<?php
/**
 *  Copyright (C) 2017  Total Studio Kft.
 *  Author: Tamás Gergely
 *  This file is a part of Studio CMS engine.
 *
 */
/** @var \App\View\AppView $this */

if (!empty($widget->special['my_map'])) {
    echo $widget->special['my_map'];
} else {
    if(!empty($widget->special['markers'])){
        foreach ($widget->special['markers'] as $marker){
            $markers[] = [
                'lat'     => $marker['lat'] ?? null,
                'lng'     => $marker['lng'] ?? null,
                'title'   => $marker['title'] ?? null,
                'content' => '<h2>'.$marker['title'].'</h2><br>'.(nl2br($marker['text']) ?? null). (!empty($marker['link'])? '<br><a href="'.$marker['link'].'" class="btn btn-primary mt-2" target="_blank">Térkép</a>' : ''),
                //'icon' => $this->Url->image('marker.png', ['fullBase' => true])
            ];
        }
    }else{
        $markers = [
            [
                'lat'     => $widget->special['lat'] ?? null,
                'lng'     => $widget->special['lng'] ?? null,
                'title'   => $widget->special['title'] ?? null,
                'content' => $widget->special['title'] ?? null,
                //'icon' => $this->Url->image('marker.png', ['fullBase' => true])
            ]
        ];
    }

    echo $this->TsHtml->googleMaps($markers, [

        'zoom' => 8,
        'type' => 'R',
        'lat'  => $markers[0]['lat'],
        'lng'  => $markers[0]['lng'],
        'div'  => ['id' => 'studio-map', 'width' => 'auto', 'height' => 700],
        'map'  => [
            'scrollwheel' => false,
            'navOptions'  => ['style' => 'SMALL'],
            'typeOptions' => ['style' => 'HORIZONTAL_BAR', 'pos' => 'RIGHT_BOTTOM'],

        ],
        'static' => (!empty($widget->special['static_map']) ? true : null),
        // 'styles'      => json_decode('[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#f3f0ef"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#e9e6e6"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]}]'),
        'size' => '600x600',
        'autoCenter'   => false

    ]);
}

?>