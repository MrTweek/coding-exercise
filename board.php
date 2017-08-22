<?php

class board {

    private $width;
    private $height;

    private $board = [];

    public function __construct($width, $height) {

        /* less than 3 will lead to overlapping neighboouring cells */
        if ($width < 3 or $height < 3) {
            throw new \RuntimeException('Width and height must be at least 3');
        }

        for ($x = 0; $x < $width; $x++) {
            $this->board[$x] = [];
            for ($y = 0; $y < $height; $y++) {
                $this->board[$x][$y] = 0;
            }
        }

        $this->width  = $width;
        $this->height = $height;

    }

    public function set($x, $y, $value) {
        /* wrap board */
        $x = $x % $this->width;
        $y = $y % $this->height;

        /* enforce 0/1 integers to make counting easier */
        $value = $value ? 1 : 0;

        $this->board[$x][$y] = $value;
    }

    public function get($x, $y) {
        /* wrap board */
        $x = ($this->width+$x) % $this->width;
        $y = ($this->height+$y) % $this->height;

        return $this->board[$x][$y];
    }

    private function neighbourCount($x, $y) {
        return $this->get($x-1, $y-1)
             + $this->get($x-1, $y  )
             + $this->get($x-1, $y+1)
             + $this->get($x  , $y-1)
             + $this->get($x  , $y+1)
             + $this->get($x+1, $y-1)
             + $this->get($x+1, $y  )
             + $this->get($x+1, $y+1)
             ;
    }

    public function cycle() {
        $newBoard = [];
        for ($x = 0; $x < $this->width; $x++) {
            $newBoard[] = [];
            for ($y = 0; $y < $this->height; $y++) {

                $newCell = $this->board[$x][$y];

                $count = $this->neighbourCount($x, $y);

                if ($count < 2) {
                    $newCell = 0;
                }

                if ($count > 3) {
                    $newCell = 0;
                }

                if ($count == 3) {
                    $newCell = 1;
                }

                $newBoard[$x][$y] = $newCell;

            }
        }
        $this->board = $newBoard;
    }

    public function print() {
        echo '╔'.str_repeat('═', $this->width).'╗'.PHP_EOL;
        for ($x = 0; $x < $this->width; $x++) {
            echo '║';
            for ($y = 0; $y < $this->height; $y++) {
                echo $this->get($x, $y) ? 'X' : ' ';
            }
            echo '║'.PHP_EOL;
        }
        echo '╚'.str_repeat('═', $this->width).'╝'.PHP_EOL;
    }

}
