<?php

    function dateFormat($value) {
        return date('H:i:s - d m Y', strtotime($value));
    }

?>