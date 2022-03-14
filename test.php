<?php
    $waterInkStr = 'Hello, Justin';
    for($i = 0; $i < strlen($waterInkStr); $i++){
        $word = substr($waterInkStr, $i, 1);
        echo $word;
    }
    
?>