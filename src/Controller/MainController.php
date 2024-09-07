<?php

namespace App\Controller;

use App\Model\User;
use FPDF;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MainController {
    public function generatePDF(User $user) {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello ' . $user->getName());
        $pdf->Output();
    }

    public function sendEmail(User $user) {
        $transport = (new Swift_SmtpTransport('sandbox.smtp.mailtrap.io', 2525))
            ->setUsername('862c1983d397bd')
            ->setPassword('8e08ecc3d00467');

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Prueba de libreria email'))
            ->setFrom(['from@example.com' => 'Your Name'])
            ->setTo([$user->getEmail()])
            ->setBody('Hola si se pudo enviar el correo');

        $mailer->send($message);
    }
}
