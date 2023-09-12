<!doctype html>
<html lang="PT-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Dangelo Martins">

  <title>Dangelo Martins</title>

  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>

<body class="d-flex h-100 text-center text-white">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">

      <div class="nav1">
        <div class="container">
          <div class="foto"><img src="img/fotorosto4.svg" alt="Dangelo" width="220" height="220" /></div>
        </div>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" aria-current="page" href="#">Artigos</a>
          <a class="nav-link" href="#">Galeria de fotos</a>
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#msgsms">Msg rápida</a>
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#reuniao">Agendar Reunião</a>
        </nav>
      </div>
    </header>
    <br>
    <br>
    <div class="nav3">
      <iframe width="600" height="600" src="https://player.vimeo.com/video/827090230?background=1" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>

</body>

<!-- Modal -->

<div class="modal fade" id="reuniao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog bg-dark">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: rgb(0, 0, 0);" id="staticBackdropLabel">Agendar reunião</h5>
        <button type="button" class="btn-close m-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" style="color: rgb(0, 0, 0); text-align: left;">
        <!--Fomulario de Reunião-->
        <form method="POST" action="processa.php">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="nome" class="form-control" name="nome" id="nome" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="">
          </div>
          <div class="mb-3">
            <label class="form-label" for="phone">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="" maxlength="33" />
          </div>

          <fieldset class="row mb-3" style="color: rgb(0, 0, 0);">
            <p>Como deseja realizar reunião?</p>

            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1" id="gridRadios1" value="audio" checked>
                <label class="form-check-label" for="gridRadios1">
                  Áudio conferência
                </label>
              </div>
              <div class="form-check" style="color: rgb(0, 0, 0);">
                <input class="form-check-input" type="radio" name="radio2" id="gridRadios2" value="video">
                <label class="form-check-label" for="gridRadios2">
                  Video conferência.
                </label>
              </div>

            </div>
          </fieldset>

          <hr>
          <p>
          <h5>Você recebera um e-mail com a confirmação da reunião agendada.</h5>
          </p>
      </div>

      <div class="modal-footer">
        <button type="submit" value="enviar" name="enviareuni" class="btn btn bg-success text-white">Enviar</button>

      </div>
    </div>
  </div>
</div>
</form>

<!--Scrip para chamada via Iframe no Moldal Colaborador-->
<script>
  var iframe = document.getElementById("iframe");
  iframe.onload = function() {
    formSubmitResponse(iframe);
  };

  function formSubmitResponse(iframe) {
    var idocument = (iframe.contentDocument || iframe.contentWindow.document);
    if (idocument) {
      var responseFromBackend = idocument.getElementsByTagName("body")[0].innerHTML;
    }
  }
</script>
<!--Limpa o campos do modal ao fechar-->
<script>
  $('#reuniao').on('hidden.bs.modal', function() {
    $(this).find('#cadcolab').trigger('reset');
  })
</script>

<!-- Colocar parenteses no DD e formatar o numero conforme usuario digita -->
<script>
  const isNumericInput = (event) => {
    const key = event.keyCode;
    return ((key >= 48 && key <= 57) || //Permitir linha numérica
      (key >= 96 && key <= 105) // Permitir Teclado Numerico
    );
  };

  const isModifierKey = (event) => {
    const key = event.keyCode;
    return (event.shiftKey === true || key === 35 || key === 36) || // Permitir Shift, Home, End
      (key === 8 || key === 9 || key === 13 || key === 46) || // Permitir Backspace, Tab, Enter, Excluir
      (key > 36 && key < 41) || // Permitir esquerda, cima, direita, baixo
      (
        // Permitir Ctrl/Comando + A,C,V,X,Z
        (event.ctrlKey === true || event.metaKey === true) &&
        (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
      )
  };

  const enforceFormat = (event) => {
    // A entrada deve ter um formato de número válido ou uma tecla modificadora e não ter mais de dez dígitos
    if (!isNumericInput(event) && !isModifierKey(event)) {
      event.preventDefault();
    }
  };

  const formatToPhone = (event) => {
    if (isModifierKey(event)) {
      return;
    }

    const target = event.target;
    const input = event.target.value.replace(/\D/g, '').substring(0, 11); //Apenas os primeiros 11 dígitos da entrada (62)98415-3899
    const zip = input.substring(0, 2);
    const middle = input.substring(2, 7);
    const last = input.substring(7, 11);

    if (input.length > 7) {
      target.value = `(${zip}) ${middle}-${last}`;
    } else if (input.length > 2) {
      target.value = `(${zip}) ${middle}`;
    } else if (input.length > 0) {
      target.value = `(${zip}`;
    }
  };

  const inputElement = document.getElementById('telefone');
  inputElement.addEventListener('keydown', enforceFormat);
  inputElement.addEventListener('keyup', formatToPhone);
</script>

<!-- Modal Mensagem de celular-->

<div class="modal fade" id="msgsms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog bg-dark">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: rgb(0, 0, 0);" id="staticBackdropLabel">Enviar uma mensagem</h5>
        <button type="button" class="btn-close m-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" style="color: rgb(0, 0, 0); text-align: center;">
        <!--Fomulario de Reunião-->
        <div>
          <span style="font-size: larger;">Telegram</span>
          <a href="https://t.me/Dmudo" target="_blank"><img src="img/telegram.svg" width="80" height="80"></a>

        </div>
        <br>
        <div>
          <span style="font-size: larger;">Whatsapp</span>
          <a href="https://api.whatsapp.com/send?phone=5562984153899&text=Preciso%20falar%20com%20voc%C3%AA." target="_blank"><img src="img/Whatsapp.svg" width="80" height="80"></a>

        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

</html>