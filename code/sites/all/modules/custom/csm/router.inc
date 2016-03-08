<?php
function router()
{
    $path = request_path();
    switch ($path) {
        case 'product-view':
            $page = array(
                '#markup' => theme('product-view', array()),
            );
            break;
        default:
            $page = array(
                '#markup' => "<div>Hello, world</div>",
            );
            break;
    }
    return $page;
}
