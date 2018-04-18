<?php

$str = 'Aa01';

$c1 = preg_match('/[0-9]/', $str);
$c2 = preg_match('/[a-z]/', $str);
$c3 = preg_match('/[A-Z]/', $str);
$c4 = preg_match('/@/', $str);
$c5 = preg_match('/~/', $str);
$c6 = preg_match('/\$/', $str);
$c7 = preg_match('/!/', $str);

if (!(($c1 && $c2 && $c3) && ($c4 || $c5 || $c6 || $c7))) {
	    	echo "alert";
	    } else {
	    	echo "valid";
	    }
