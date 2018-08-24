<?php
$content = explode(" ", str_replace(["\n", "  "], " ", file_get_contents("php://stdin")));
$count = $content[0];
unset($content[0]);
foreach ($content as $val) {
    print(fac($val)."\n");
    $count--;
    if ($count == 0)
        break;
}

function fac($val)
{
    $ans = 1;
    for ($i = 2; $i <= $val; $i++)
        $ans *= $i;
    return $ans;
}