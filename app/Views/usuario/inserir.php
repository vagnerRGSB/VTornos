<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário cadastro de Usuário</h1>

        <div class="container">
            <?php if (session()->has("info-erro")) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Erro Gravação</strong> <?= session()->getFlashdata("info-erro")?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <form action="<?= url_to("usuario.onSave") ?>" method="post">
                <div class="m-2">
                    <label for="nome" class="form-label">Nome usuário</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe nome completo (Obrigatório)" class="form-control" aria-describedby="info-nome">
                    <div id="info-nome" class="form-text">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["nome"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <div class="m-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" placeholder="Informe e-mail (Obrigatório)" class="form-control" aria-describedby="info-email">
                    <div id="info-email" class="form-text">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["email"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <div class="m-2">
                    <label for="email" class="form-label">Senha</label>
                    <input type="password" id="email" name="senha" placeholder="Informe senha (Obrigatório)" class="form-control" aria-describedby="info-senha">
                    <div id="info-senha" class="form-text">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["senha"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn m-3"> <i class="bi bi-floppy"></i> Salvar</button>
                <a href="<?= url_to("usuarios.listar") ?>" class="btn btn-danger"><i class="bi bi-x"></i> Voltar</a>
            </form>
        </div>

</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>