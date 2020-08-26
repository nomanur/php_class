<?php 

$info = array('coffee', 'brown', 'caffeine');

//list($drink, $color, $ing) = $info;
shuffle($info);
var_dump(count($info));