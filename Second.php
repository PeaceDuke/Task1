<?php
$content = explode(" ", str_replace(["\n", "  "], " ", file_get_contents("php://stdin")));
$count = $content[0];
unset($content[0]);
$flag = false;
$queue = new Queue();
foreach ($content as $val) {
    if ($flag) {
        $queue->Add($val);
        $flag = false;
    } else{
        switch ($val) {
            case 1:
                $flag = true;
                break;
            case 2:
                $queue->Pop();
                break;
            case 3:
                print($queue->View()."\n");
                break;
        }
        $count--;
    }
    if ($count == 0)
        break;
}

class Queue
{
    private $queue = array();
    private $head = 0;
    private $tail = 0;

    public function Add($val)
    {
        $this->queue[$this->tail++] = $val;
    }

    public function Pop()
    {
        if ($this->head == $this->tail)
            return;
        unset($this->queue[$this->head++]);
    }

    public function View()
    {
        if ($this->head == $this->tail)
            return "Empty!";
        return $this->queue[$this->head];
    }
}