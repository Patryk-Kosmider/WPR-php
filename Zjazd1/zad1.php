<!DOCTYPE html>
<html>
<body>

<?php
$owoce = array ("pomarancz", "banan", "pomelo", "mandarynka");
foreach ($owoce as $owoc){

    $string = str_split($owoc);
    
	if ($string[0] == 'p'){
    	echo "Slowo $owoc zaczyna sie od litery p";
        echo "<br>";
    } else {
    	echo "Slowo $owoc nie zaczyna sie od litery p\n";
    	echo "<br>";
    }
  	
 
    for ($i = count($string); $i >= 0 ; $i--){
    	echo $string[$i];
    }
  
    echo "<br>";
    
}
?>

</body>
</html>
