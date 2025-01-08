<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid ">
    <a class="navbar-brand" href="<?= url_to("home.principal") ?>"> <i class="bi bi-house"></i> V Tornos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= url_to("localidade.listar") ?>">Localidades</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perfil,
            <?php if (session()->has("login")) : ?>
              <?= session()->get("login")->nome ?>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= url_to("usuarios.listar") ?>">Membros do sistema</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Editar meus dados</a></li>
            <li><a class="dropdown-item" href="<?= url_to("login.onLogout") ?>"> <i class="bi bi-person-walking"></i> Sair do sistema</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</nav>