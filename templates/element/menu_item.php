<?php
$urlParts = [];
$span = '';

if (!empty($data['req_plugin'])) {
    $urlParts['plugin'] = $data['req_plugin'];
} else {
    $urlParts['plugin'] = false;
}
if (!empty($data['req_controller'])) {
    $urlParts['controller'] = $data['req_controller'];
}
if (!empty($data['req_action'])) {
    $urlParts['action'] = $data['req_action'];
}

if (!empty($data['model']) && $data['model'] == 'Pages' && !empty($menuUrlEntities['TSCms.Pages'][$data['model_id']]['slug'])) {
    $urlParts['slug'] = $menuUrlEntities['TSCms.Pages'][$data['model_id']]['slug'];
}

if (!empty($data['model']) && $data['model'] == 'Webshop.WebshopCategories' && !empty($menuUrlEntities['Webshop.WebshopCategories'][$data['model_id']]['slug'])) {
    $urlParts['slug'] = $menuUrlEntities['Webshop.WebshopCategories'][$data['model_id']]['slug'];
    $urlParts['category_id'] = $menuUrlEntities['Webshop.WebshopCategories'][$data['model_id']]['id'];
}

if ($data['rght'] - $data['lft'] > 1) {
    $span = $this->Html->tag('span', '');
}

$target = false;
if (!empty($data['model']) && $data['model'] == 'Url' || !empty($data['url'])) {
    if (empty($data['url'])) {
        $data['url'] = '#';
    }
    $target = (substr_count($data['url'], '://') > 0? '_blank' : false);
} else {
    try {
        $data['url'] = $this->Url->build($urlParts);
    } catch (Exception $e) {
        $data['url'] = '#MissingRoute'.$data['id'];
    }
}

echo $this->Html->link(
    $data['name'] . $span,
    $data['url'],
    [
        'escape' => false,
        'class' => (('/' . $this->getRequest()->getUri() == $data['url']) ? 'active' : NULL),
        'target' => $target
    ]
);


if (!empty($data['children'])) {
    $this->Tree->addItemAttribute('class', 'submenu');
}