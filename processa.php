<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa</title>
</head>
<body>

        <?php 
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        
        
        require 'lib/vendor/autoload.php';

        $email = new Sendgrid\Mail\Mail(null, "dangelomartins@gmail.com");
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("test@example.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
                $sendgrid = new \SendGrid(getenv('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'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }


?>

    
</body>
</html>