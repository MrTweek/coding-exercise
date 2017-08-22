<?php

require_once 'board.php';

$board = new Board(20, 20);

$board->set(3, 3, 1);
$board->set(3, 4, 1);
$board->set(3, 5, 1);

$board->print();
for ($i = 0; $i < 10; $i++) {
    sleep(1);
    $board->cycle();
    $board->print();
}
