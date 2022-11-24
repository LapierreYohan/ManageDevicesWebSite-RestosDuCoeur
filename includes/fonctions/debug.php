<?php

function debug($var, $bool = false): void
{
    echo "<pre>\n";
    var_dump($var);
    echo "</pre>\n";

    if ($bool) {
        exit();
    }
}
