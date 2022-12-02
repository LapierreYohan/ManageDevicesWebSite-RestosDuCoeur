<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function active_class(string $link, string $title): string
{
    if ($link == "/") {
        $link = "/index.php";
    }
    $class = "nav-link ";
    $currentFile = basename($_SERVER["PHP_SELF"]);
    if ($currentFile === basename($link)) {
        $class .= "active";
    }
    $html =  '<li class="nav-item"><a class="' . $class . '"href="' . $link . '">' . $title . '</a></li>';
    return $html;
}
?>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid" style="font-size: 18px;">
            <a class="navbar-brand me-lg-4" href="/index.php"> <img src="/img/Resto.png" height="60px" class="ms-2 me-1"></img>Restos Du Coeur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?= active_class("/pages/home.php", "Accueil") ?>
                    <?= active_class("", "DashBoard") ?>
                    <?= active_class("", "Sites") ?>
                    <?= active_class("", "Matériels") ?>
                    <?= active_class("", "Paramètres") ?>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        
                    <div class="flex-shrink-0 dropdown text-end me-3">
                        <a href="#" class="d-flex align-items-center text-light link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
                            <?php if (isset($_SESSION['User'])) { ?>
                            <img src="<?= $_SESSION['User']['Image'] ?>" alt="" width="50" height="50" class="rounded-circle me-2">
                            <strong><?= ucfirst($_SESSION['User']['Prenom']) . ' ' . $_SESSION['User']['Nom'] ?></strong>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
                            <li><a class="dropdown-item" href="/pages/profil.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pages/disconnect.php">Se Déconnecter</a></li>
                        </ul>
                    </div>

                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</header>