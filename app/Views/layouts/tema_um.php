<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema V.Tornos</title>
  <?= view("layouts/partials/styles",[],["cache"=>60,"cache_name"=>"partials_styles"]) ?>
  <?= $this->renderSection("style") ?>
</head>
<body>
  <?= $this->include("layouts/partials/menu") ?>
  <div class="container-fluid position-relative">
    <?= $this->renderSection("conteudo") ?>
  </div>
  <?= view("layouts/partials/scripts",[],["cache"=>60,"cache_name"=>"partials_scripts"]) ?>
  <?= $this->renderSection("script") ?>
</body>
</html>