<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/head.php";

function active_class(string $link): string
{
    if ($link == "/") {
        $link = "/index.php";
    }
    $class = "nav-link headernav ";
    $currentFile = basename($_SERVER["PHP_SELF"]);
    if ($currentFile === basename($link)) {
        $class .= "active";
    }
    $html =  '<a class="' . $class . '"href="' . $link . '" aria-current="page" style="font-size: large;">';
    return $html;
}
?>
<link href="/css/home.css" rel="stylesheet">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <button class="navbar-toggler me-4 mb-3 mt-3 ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel" aria-modal="true" role="navigation">
        <div class="offcanvas-header">
            <a style="text-decoration: none;" class="text-secondary" href="/index.php"> <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel"> <img src="/img/Resto.png" height="45px" class="ms-2 me-3"></img>Restos Du Coeur</h5></a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav"><li><hr class="offcanvas-divider"></li></ul>
            <nav id="sidebarMenu" class="sidebar ms-4 mt-5">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?= active_class("/pages/home.php") ?>
                        <i class="bi bi-app-indicator me-1"></i>
                        Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <?= active_class("/pages/dashboard.php") ?>
                        <i class="bi bi-speedometer2 me-1"></i>
                        DashBoard
                        </a>
                    </li>
                    <li class="nav-item">
                        <?= active_class("/pages/sites.php") ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers align-text-bottom" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Sites
                        </a>
                    </li>
                    <li class="nav-item">
                        <?= active_class("/pages/materiels.php") ?>
                        <i class="bi bi-box2 me-1"></i>
                        Matériels
                        </a>
                    </li>
                    <li class="nav-item">
                        <?= active_class("/pages/report.php") ?>
                        <i class="bi bi-file-earmark-play me-1"></i>
                        Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <?= active_class("/pages/parametres.php") ?>
                        <i class="bi bi-sliders2-vertical me-1"></i>
                        Paramètres
                        </a>
                    </li>
            
                </ul>
            </nav>
        </div>
    </div>
    
    <input class="form-control form-control-dark w-100 rounded-0 border-0 bg bg-dark text-white" type="text" placeholder="Recherche" aria-label="Search">
    <div class="ms-3">
        <div class="nav-item text-nowrap">
            <div class="flex-shrink-0 dropdown text-end me-3">
                <a href="#" class="d-flex align-items-center text-light link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION['User'])) { ?>
                    <img src="<?= $_SESSION['User']['Image'] ?>" alt="" width="50" height="50" class="rounded-circle me-2">
                    <strong style="font-size: 18px;"><?= ucfirst($_SESSION['User']['Prenom']) . ' ' . $_SESSION['User']['Nom'] ?></strong>
                    <?php } ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
                    <li><a class="dropdown-item" href="/pages/profil.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="">Messagerie</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/pages/disconnect.php">Se Déconnecter</a></li>
                </ul>
                    
        </div>
    </div>
</header>