<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("sytle")?>

<?= $this->endSection() ?>
<?= $this->section("conteudo")?>
<div class="d-grid gap-2 d-md-flex justify-content-md-center mt-1 mb-1++">
    <a class="btn btn-info btn-sm" href="#"> <i class="bi bi-radar"></i> Peças mais vendidas</a>
    <a class="btn btn-info btn-sm" href="#"> <i class="bi bi-radar"></i> Maquinários mais reparados </a>
</div>
<h1 class="h1">Atenções rápidas para o sistema</h1>
<?= $this->endSection() ?>
<?= $this->section("script")?>

<?= $this->endSection() ?>