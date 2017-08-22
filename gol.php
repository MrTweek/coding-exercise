<?php

require_once 'board.php';

$board = new Board(20, 40);

/* oscillator */
$board->set(12, 13, 1);
$board->set(12, 14, 1);
$board->set(12, 15, 1);

/* still life */
$board->set(34, 25, 1);
$board->set(35, 24, 1);
$board->set(35, 26, 1);
$board->set(36, 25, 1);


/* glider */
$board->set(3, 3, 1);
$board->set(4, 3, 1);
$board->set(5, 3, 1);
$board->set(3, 4, 1);
$board->set(4, 5, 1);


$board->print();

while (true) {
    usleep(100000);
    $board->cycle();
    $board->print();
}
