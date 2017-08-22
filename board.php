<?php

class board {

    private $width;
    private $height;

    private $board = [];

    /* Initialize an empty board */
    public function __construct($height, $width) {

        /* less than 3 will lead to overlapping neighboouring cells */
        if ($width < 3 or $height < 3) {
            throw new \RuntimeException('Width and height must be at least 3');
        }

        for ($x = 0; $x < $height; $x++) {
            $this->board[$x] = [];
            for ($y = 0; $y < $width; $y++) {
                $this->board[$x][$y] = 0;
            }
        }

        $this->width  = $width;
        $this->height = $height;

    }

    /* set any cell on the board to 1 or 0 */
    public function set($x, $y, $value) {
        /* wrap board */
        $x = $x % $this->height;
        $y = $y % $this->width;

        /* enforce 0/1 integers to make counting easier */
        $value = $value ? 1 : 0;

        $this->board[$x][$y] = $value;
    }

    /* fetch the value of any cell */
    public function get($x, $y) {
        /* wrap board */
        $x = ($this->height+$x) % $this->height;
        $y = ($this->width+$y) % $this->width;

        return $this->board[$x][$y];
    }

    /* Return the number of neighbouring cells that are alive */
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

    /* Jump one step in time ahead */
    public function cycle() {
        $newBoard = [];
        for ($x = 0; $x < $this->height; $x++) {
            $newBoard[] = [];
            for ($y = 0; $y < $this->width; $y++) {

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

    /* Dump the board with 1337 ascii art */
    public function print() {
        /* PHP Cli does not have an easy, cross-platform compatible clear screen :( */
        echo str_repeat(PHP_EOL, 100);
        echo '╔'.str_repeat('═', $this->width).'╗'.PHP_EOL;
        for ($x = 0; $x < $this->height; $x++) {
            echo '║';
            for ($y = 0; $y < $this->width; $y++) {
                echo $this->get($x, $y) ? '█' : ' ';
            }
            echo '║'.PHP_EOL;
        }
        echo '╚'.str_repeat('═', $this->width).'╝'.PHP_EOL;
    }

}
