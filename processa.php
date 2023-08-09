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

 //$nome = $_POST['nome'];
 //$mail = $_POST['email'];
 //$telefone = $_POST['telefone'];

  require 'vendor/autoload.php';

  /*
  $from = new SendGrid\Mail\From("dangelomartins@gmail.com");
  //$subject = new SendGrid\Mail\Subject("Emial agendado co sucesso");
  $to = new SendGrid\Mail\To("pedropedasi@gmail.com");
  $content = new SendGrid\Mail\Content("Email para agendar reuniao para");
  $mail = new SendGrid\Mail\Mail($from, $to, $content);

  $apiKey = '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';
  $sg = new \SendGrid($apiKey);

  $response = $sg->client->mail()->send()->post($mail);
  echo "Mensagem enviada com sucessao";
  */
  
  $email = new \SendGrid\Mail\Mail();
  $email->setFrom("dangelomartins@gmail.com", "dangelomartins@gmail.com");
  $email->setSubject("Sending with Twilio SendGrid is Fun");
  $email->addTo("pedropedasi@gmail.com", "Example User");
  $email->addContent("text/plain", "and easy to do anywhere, even with PHP");

  $sendgrid = new \SendGrid('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');
  try {
      $response = $sendgrid->send($email);
      echo "Mensagem enviada com sucesso!"; 
  } catch (Exception $e) {
      echo "Erro ao enviar mensagem";
  }
  ?>

</body>

</html>
