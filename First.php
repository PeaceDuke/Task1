<?php
$content = explode(" ", str_replace(["\n", "  "], " ", file_get_contents("php://stdin")));
$length = 0;
$queue = array();
foreach ($content as $val) {
    if ($val == 0) {
        queue_check($queue);
        break;
    }
    if ($length == 0) {
        queue_check($queue);
        unset($queue);
        $length = $val;
    } else {
        $queue[--$length] = $val;
    }

}

function queue_check(array $queue)
{
    if (sizeof($queue) == 0)
        return;
    $t = 0;
    foreach ($queue as $val) {
        if ($t == 0)
            $t = $val;
        else {
            if ($val > $t + 1) {
                print("Ans: No\n");
                return;
            }
            $t = $val;
        }
    }
    print("Yes\n");
}