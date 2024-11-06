<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
    <h3 class="h3 text-center m-3">Formulário cadastro de Usuário</h1>

        <div class="container">
            <form action="<?= url_to("usuario.onSave") ?>" method="post">
                <input type="hidden" name="idUsuario" value="<?= esc($usuario->idUsuario) ?>">
                <div class="m-2">
                    <label for="nome" class="form-label">Nome usuário</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe nome completo (Obrigatório)" class="form-control" aria-describedby="info-nome"
                        value="<?= esc($usuario->nome) ?>">
                    <div id="info-nome" class="form-text">
                        <span class="text-danger">
                            <?= session()->getFlashdata("erro")["nome"] ?? "" ?>
                        </span>
                    </div>
                </div>
                <div class="m-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" placeholder="Informe e-mail (Obrigatório)" class="form-control" aria-describedby="info-email"
                        value="<?= esc($usuario->email) ?>">
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
                <a href="<?= url_to("usuarios.listar") ?>" class="btn btn-secondary"><i class="bi bi-x"></i> Voltar</a>
            </form>
        </div>

</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>