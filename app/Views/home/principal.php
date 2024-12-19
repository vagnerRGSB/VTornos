<?= $this->extend("layouts/tema_um") ?>
<?= $this->section("sytle") ?>


<?= $this->endSection() ?>
<?= $this->section("conteudo") ?>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-1 mb-1++">
    <a class="btn btn-primary btn-sm" href="#"> <i class="bi bi-clipboard-data-fill"></i> Peças mais vendidas</a>
    <a class="btn btn-primary btn-sm" href="#"> <i class="bi bi-clipboard-data-fill"></i> Maquinários mais reparados </a>
</div>
<div class="row row-cols-2 mt-1">
    <div class="col">
        <div class="border">
            <h4 class="h4 text-center"><strong>Mercadorias em Baixa no Estoque</strong></h4>

        </div>
    </div>
    <div class="col">
        <div class="border">
            <h4 class="h4 text-center"><strong>Agenda de Ações</strong></h4>
            <div class="m-2" id="calendar">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });

        calendar.render();
    });
</script>
<?= $this->endSection() ?>