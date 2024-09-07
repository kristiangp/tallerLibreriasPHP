<?php

namespace App\Model;

class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function calculateBMI($weight, $height) {
        return $weight / ($height * $height);
    }

    public function convertCurrency($amount, $rate) {
        return $amount * $rate;
    }
}
