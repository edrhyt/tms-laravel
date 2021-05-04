<?php

if (! function_exists('numberWithCommas')) {
    function numberWithCommas($x) {
        return number_format($x, 0);
    }
}

?>