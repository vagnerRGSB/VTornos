<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário de Login</title>
    <!-- Link do CSS do Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center mb-4">Login V Tornos</h2>

                <?php if (session()->has("infoError")) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> <i class="bi bi-exclamation-circle"></i> Erro de login: </strong> <?= session()->getFlashdata("infoError") ?>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= url_to("login.onLogin") ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Usuário</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="info-email" placeholder="Digite seu email de usuário">
                        <div id="info-email" class="form-text">
                            <span class="text-danger"><?= session()->getFlashdata("errors")["email"] ?? "" ?></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="info-senha" placeholder="Digite sua senha">
                        <div id="info-senha" class="form-text">
                            <span class="text-danger"><?= session()->getFlashdata("errors")["senha"] ?? "" ?></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"> <i class="bi bi-person-walking"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Link do JS do Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>