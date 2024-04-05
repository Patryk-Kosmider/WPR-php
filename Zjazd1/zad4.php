<!DOCTYPE html>
<html>
<body>


<?php

$text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

$text_arr = explode(" ", $text);
for ($i = 0; $i < count($text_arr); $i++) {
    $sign = substr($text_arr[$i], -1); 
    if ($sign == '.' || $sign == ',') {
        unset($text_arr[$i]);
        $text_arr = array_values($text_arr);
        $i--;
    }
}
    
$assoc = array();
$x = 0;
foreach($text_arr as $index => $value){
    if($x % 2 == 0){
        $key = $value;
    } else {
        $assoc[$key] = $value;
        echo $key . "=>" . $value . '<br>';
    }
    $x++;
}


?>

</body>
</html>
