<?php

// Include the source for class
require_once("class-stopwatch.php");

// Creates a new object
$o = new Stopwatch();

// The first call to lap starts the stopwatch.
// The parameter is a convenient label for display.
// If no parameter is given a default string is used.
$o->lap('1st lap - they have started!');

// Sleep for a tiny bit and then call the lap method with a suitable label.
usleep(100000);
$o->lap('2nd lap - they are speeding!');

// Sleep for a tiny bit and then call the lap method with a suitable label.
usleep(300000);
$o->lap('3rd lap - hmm getting slower!');

// Sleep for a tiny bit and then call the lap method with a suitable label.
usleep(400000);
$o->lap('4th lap - could this be the slowest?!?!');

// Sleep for a tiny bit and then call the lap method with a suitable label.
usleep(200000);
$o->lap('5th lap - abit better!');

// If the boolean 'true' is passed as a parameter then output will include a HTML <BR> for each newline.
// Handy for web output.
$o->display();

?>
