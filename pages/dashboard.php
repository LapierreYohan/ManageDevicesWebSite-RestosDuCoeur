<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=², initial-scale=1.0">
  <link rel="shortcut icon" href="/img/favicon.ico">
  
  <!-- CSS -->
  <link rel="stylesheet" href="/css/flickity.min.css">
  <link rel="stylesheet" href="/css/flickity.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>DashBoard</title>
</head>

<body>
    <?php require_once __DIR__ . "/../modules/header.php";?>

    <main class="container mt-3">
        <div class="container px-4 py-3 bg-dark border-dark rounded-3" style="margin-top: 3%;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="resetSelector">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        This week
                    </button>
                </div>
            </div>

            <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="850" height="358" style="display: block; height: 287px; width: 680px;"></canvas>

            <h2 class="pb-2 border-bottom resetSelector">Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                
                </table>
                </br></br>
            </div>
        </div>
        
    </main>
    <?php require_once __DIR__ . "/../modules/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>