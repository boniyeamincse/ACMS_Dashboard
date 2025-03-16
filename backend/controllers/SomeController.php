require_once '../services/EmailService.php';

class SomeController {
    public function someAction() {
        $emailService = new EmailService();
        $to = 'recipient@example.com';
        $subject = 'Test Email';
        $content = 'This is a test email.';

        try {
            $statusCode = $emailService->sendEmail($to, $subject, $content);
            echo "Email sent successfully with status code: $statusCode";
        } catch (Exception $e) {
            echo "Error sending email: " . $e->getMessage();
        }
    }
}