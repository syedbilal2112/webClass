<?php

echo "hiiiiiiiii";

$a = 1;
$b = 1.5;
$c = "abcd";
$d = true;

$arr = [1,4,"asdf",5];

for ($i=0; $i < count($arr); $i++) { 
	echo $arr[$i] . "<br>";
}

if ($d) {
	echo "inside true";
} else {
	echo "inside false";
}

?>