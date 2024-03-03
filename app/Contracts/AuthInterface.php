<?php

namespace App\Contracts;

Interface AuthInterface {

    public function login($credentials): bool;
}
