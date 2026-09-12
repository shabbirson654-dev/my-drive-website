<?php

$pattern="q1w2e3r4t5y6u7i8o9p0[-]=a!s@d#fg%h^j&k*l(;)'_\+z:x|c?vF`,M";
$length= strlen($pattern)-1;
$password=[];
for ($i=0; $i < 8; $i++) { 
    # code...
  $index=  rand(0,$length);
 $password[]= $pattern[$index];
}
echo implode($password);
?>