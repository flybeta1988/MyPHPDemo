<?php

require __DIR__ . '/../vendor/autoload.php';

use Amp\Delayed;
use Amp\Loop;
use function Amp\asyncCall;

// Shows how two for loops are executed concurrently.

// Note that the first two items are printed _before_ the Loop::run()
// as they're executed immediately and do not register any timers or defers.

print date('Y-m-d H:i:s'). PHP_EOL;

asyncCall(function () {
    yield new Delayed(2000);
});

asyncCall(function () {
    yield new Delayed(3000);
});

print "-- before Loop::run()" . PHP_EOL;

Loop::run();

print "-- after Loop::run()" . PHP_EOL;

print date('Y-m-d H:i:s'). PHP_EOL;
