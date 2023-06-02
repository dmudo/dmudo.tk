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
        $telefone = $_POST['telefone'];
 
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
        if (!empty($dados['enviareuni'])) {
          require 'vendor/autoload.php';
          $email = new \SendGrid\Mail\Mail();
      
          $email->setFrom("dangelomartinsss@gmail.com", "Dangelo");
          $email->setSubject("Agendamento de reunião");
          $email->addTo("dangelomartins@gmail.com", "Example User");
          $email->addContent("text/plain", "Cobtudo somente texto");
          $email->addContent(
            "text/html",
            "<strong>and easy to do anywhere, even with PHP</strong>"
          );
          $sendgrid = new \SendGrid(getenv('#####'));
          try {
            $response = $sendgrid->send($email);
            echo "Mensagem enviada com sucesso!<br>";
          } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
            echo "Mensagem não enviada!<br>";
          }
           echo "Erro Mensagem não enviada!";
          
        }
        ?>



    
</body>
</html>