<!-- 檔案上傳 -->
<?php
include 'functionpack.php';
$myfile = $_FILES['myfile'];
$ableImgFileName = array("jpg", "jpeg", "gif", "png");

$index = 0;
foreach($myfile['name'] as $i => $name){
    $ext = preg_replace('/^.*\.([^.]+)$/', '$1', $name);//正規()把要的group起來，所以取代用 $1 表示第一個被group的部分，取副檔名
    if(in_array($ext, $ableImgFileName) && $myfile['error'][$i] == 0){
        //建立檔名放入指定資料夾
        $fileName = createFilename($myfile['name'][$i], $index) . ".{$ext}";
        $storageFile = "./file/file/{$fileName}" ;
        move_uploaded_file($myfile['tmp_name'][$i], $storageFile);

        // 製作浮水印   
        switch ($ext){
            case "jpg":
                $img = imagecreatefromjpeg($storageFile);
                waterInk($img);
                imagejpeg($img, "./file/waterink_done/{$fileName}");
            break; 
            case "jpeg":
                $img = imagecreatefromjpeg($storageFile);
                waterInk($img);
                imagejpeg($img, "./file/waterink_done/{$fileName}");
            break; 
            case "png" :
                $img = imagecreatefrompng($storageFile);
                waterInk($img);
                imagepng($img, "./file/waterink_done/{$fileName}");
            break;  
            case "gif" :
                $img = imagecreatefromgif($storageFile);
                waterInk($img);
                imagegif($img, "./file/waterink_done/{$fileName}");
            break;  
        }

        imagedestroy($img);  
        $index++;
        echo 'ok';
    }else{
        echo 'XX';
    }
}
header("Refresh:2 ; url=index.html");
echo "<script>alert('結果顯示 2秒後跳轉')</script>";
?>