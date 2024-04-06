<!DOCTYPE html>
<html>
<body>


<?php

function fibonacci($n){
	if($n == 0){
    	return 0;
    }
    if($n < 3){
        return 1;
    }
    
    return fibonacci($n - 2) + fibonacci($n - 1);
}

$n = 10;
$fib = array();
for($i = 0; $i < $n; $i++){
    $fib[$i] = fibonacci($i);
}


for($i = 0; $i < $n; $i++){
    if($fib[$i] % 2 != 0){
        echo $i. ". " . $fib[$i] . "<br>";    
    }
    
}



?>

</body>
</html>
