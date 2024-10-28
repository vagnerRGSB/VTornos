<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("style") ?>

<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>

<div class="border m-3">
  <h1 class="h3 text-center m-3">Lista de Usuários</h1>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome usuário</th>
        <td scope="col" class="text-end">
        <a class="btn btn-primary btn-sm text-end" href="<?= url_to("usuario.inserir") ?>"> <i class="bi bi-plus"></i> Inserir</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($usuarios)) : ?>
        <?php foreach($usuarios as $usuario) : ?>
          <tr>
            <td scope="row" class="text-start m-1"><?= esc($usuario->idUsuario) ?></td>
            <td class="text-start m-1"><?= esc($usuario->nome) ?></td>
            <td class="form-label text-end">
              <a href="<?= base_url("usuario/editar/".$usuario->idUsuario) ?>" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i> Editar</a>
              <button class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> Deletar </button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="3" class="text-center">Nenhum usuário cadastrado</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="m-3">
        <?= $pager->links(); ?>
  </div>

</div>

<?= $this->endSection() ?>
<?= $this->section("script") ?>

<?= $this->endSection() ?>