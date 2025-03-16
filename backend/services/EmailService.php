<?php
use SendGrid\Mail\Mail;

class EmailService {
    private $sendGrid;

    public function __construct() {
        $this->sendGrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    }

    public function sendEmail($to, $subject, $content) {
        $email = new Mail();
        $email->setFrom("