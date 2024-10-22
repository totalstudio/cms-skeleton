<?php
    /**
     *  Copyright (C) 2017  Total Studio Kft.
     *  Author: Tamás Gergely
     *  This file is a part of Studio CMS engine.
     *
     */
    /** @var \App\View\AppView $this */


$options = [

    'zoom' => 15,
    'type' => 'R',
    'div'  => ['id' => 'studio-map', 'width' => 'auto', 'height' => 700],
    'map'  => [
        'scrollwheel' => FALSE,
        'navOptions'  => ['style' => 'SMALL'],
        'typeOptions' => ['style' => 'HORIZONTAL_BAR', 'pos' => 'RIGHT_BOTTOM'],

    ],
    'styles'      => json_decode('[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#f3f0ef"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#e9e6e6"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]}]'),
    'static' => (!empty($widget->special['static_map']) ? TRUE : NULL),
    'size' => '600x600',

];


if(strpos($widget->special['lat'], ';') !== FALSE && strpos($widget->special['lng'], ';') !== FALSE) {
    $boomLng = explode(';', $widget->special['lng']);
    $boomLat = explode(';', $widget->special['lat']);

    foreach($boomLat as $k => $lat) {
       $markers[] = [
           'lat'     => $lat,
           'lng'     => $boomLng[$k],
           'title'   => $widget->special['title'] ?? NULL,
           'content' => $widget->special['title'] ?? NULL,
           //'icon' => $this->Url->image('marker.png', ['fullBase' => true])
       ];
    }

    $options['autoCenter'] = TRUE;


}
else{
    $markers = [
        [
            'lat'     => $widget->special['lat'] ?? NULL,
            'lng'     => $widget->special['lng'] ?? NULL,
            'title'   => $widget->special['title'] ?? NULL,
            'content' => $widget->special['title'] ?? NULL,
            //'icon' => $this->Url->image('marker.png', ['fullBase' => true])
        ]
    ];
    $options['lat'] = $widget->special['lat'];
    $options['lng'] = $widget->special['lng'];
}


if (!empty($widget->special['my_map'])) {
    echo $widget->special['my_map'];
} else {
    echo $this->TsHtml->googleMaps($markers, $options);
}

    ?>
