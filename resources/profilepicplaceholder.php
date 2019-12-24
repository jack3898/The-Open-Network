<?php

header('Content-type: image/svg+xml');

if(isset($_GET['colour'])){
    $colour = $_GET['colour'];
} else if(isset($_GET['colourhex'])) {
    $colour = '#' . $_GET['colourhex'];
} else {
    $colour = '#fff';
}

echo('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><style>.a{fill:#1a1a1a;}.b{fill:' . $colour . ';}.c{fill:none;stroke:' . $colour . ';stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;}</style></defs><title>profilepicplaceholder</title><rect class="a" width="200" height="200"/><path class="b" d="M100,61.33A38.67,38.67,0,1,1,61.33,100,38.72,38.72,0,0,1,100,61.33m0-3A41.67,41.67,0,1,0,141.67,100,41.67,41.67,0,0,0,100,58.33Z" transform="translate(0 0)"/><path class="c" d="M4.17,195.83S20.83,141.67,100,141.67s95.83,54.16,95.83,54.16" transform="translate(0 0)"/></svg>');