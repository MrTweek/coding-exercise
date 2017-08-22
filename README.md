Coding Exercise
===============

This is the coding test that we use for developers at sidekicker.com.au. 

The aim is to demonstrate how you approach thinking about problems and translating them to code. Fork this repository to your own, spend around 3 hours working on a solution and then submit it back to us as a pull request as though you were submitting a pull request for a task you'd done in a work environment.

Please use modern PHP or Golang, whichever you have the most experience with.

## Challenge: Conway's Game of Life

The Game of Life, also known simply as Life, is a cellular automaton devised by the British mathematician John Horton Conway in 1970.
The "game" is a zero-player game, meaning that its evolution is determined by its initial state, requiring no further input. One interacts with the Game of Life by creating an initial configuration and observing how it evolves.

http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life

![Game of Life](https://images.chaostangent.com/2009/08/gameoflife-1.gif)
![Game of Life](https://images.chaostangent.com/2009/08/gameoflife-2.gif)

### Game Rules

* A cell can be made "alive"
* A cell can be "killed"
* A cell with fewer than two live neighbours dies of under-population
* A cell with 2 or 3 live neighbours lives on to the next generation
* A cell with more than 3 live neighbours dies of overcrowding
* An empty cell with exactly 3 live neighbours "comes to life"
* The board should wrap

### Implementation

It's up to you how you implement this, especially how you render the visual representation of the game. If you are short for time, it's ok to not do any visual rendering at all, but it should be clear how that would be implemented in future. Tests are also optional, but looked upon very favourably if included. 

### Solution

`board.php` contains the actual implementation of a Game of Life Board.

`gol.php` contains a working example that can be run on the command line. It has a still life, an oscillator and a glider.

Output is very basic and done via CLI which PHP is not too great at. Works fine in my terminal on Linux, but I have not tested it on other machines.
