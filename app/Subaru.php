<?php

namespace App;

class Subaru implements CarInterface {
    public function start() {
        echo 'Starts great';
    }
    public function gas()  {
        echo 'Hit the gas and let the all wheel drive grip those back roads!';
    }
    public function brake() {
        echo 'Wow these Brembo brakes are powerful';
    }
}