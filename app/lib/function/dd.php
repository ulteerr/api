<?php
function dd()
{
    echo '<style>';
    echo '
        pre {
            background-color: #000;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            overflow: auto;
            color: #fff;
        }
    ';
    echo '</style>';

    foreach (func_get_args() as $arg) {
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
    }
    die;
}
