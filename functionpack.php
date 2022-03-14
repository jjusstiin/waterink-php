<?php

//製作檔案名稱
function createFilename($source, $index){
    date_default_timezone_set('Asia/Taipei');
    $filename = date('Ymd_His') . "_{$index}";
    return $filename;
}  

// 製作浮水印
function waterInk($img){
    $waterInkStr = 'Hello, Justin';//想輸入的文字
    for($k = 0; $k < strlen($waterInkStr); $k++){
        $word = substr($waterInkStr, $k, 1);
        $cr = rand(0,255);
        $size = rand(40,48);    //字體大小
        $angle = rand(15,-15);  //文字角度
        $spacing = 30;          //文字間距
        $color = imagecolorallocate($img, 0, $cr, $cr);//顏色選擇
        imagettftext($img, $size, $angle, (200+$k*$spacing), 400, $color, './file/ttf/font1.ttf', $word);
    }
}

?>