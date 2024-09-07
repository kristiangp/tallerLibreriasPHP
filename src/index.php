<?php

require '../vendor/autoload.php';

use App\Controller\MainController;
use App\Model\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    $user = new User($name, $email);
    $bmi = $user->calculateBMI($weight, $height);

    $controller = new MainController();
    $controller->generatePDF($user);
    $controller->sendEmail($user);
}
