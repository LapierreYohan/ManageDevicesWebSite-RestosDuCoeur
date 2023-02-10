<?php
session_start();
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>

    <title>Sites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/list-group.css">
</head>

<body>

    <?php require_once __DIR__ . "/../modules/header.php";?>

    <div class="container mt-2">
        <div class="container px-4 py-3 bg-dark border-dark rounded-3" style="margin-top: 3%;">
            <div class="wrapper">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="resetSelector">Liste des sites</h1>
                    <div class="btn-toolbar mb-1 mb-md-0">
                        <div class=" px-3 py-2 bg-dark border border-secondary rounded-3 me-4">  
                            <span class="me-2"> 
                                <input class="form-check-input bg-secondary" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid1" value="" checked>
                                <label class="" for="listGroupRadioGrid1">
                                <strong class="text-secondary">Tout</strong>
                                </label>
                            </span>
                        
                            <span class="me-2"> 
                                <input class="form-check-input bg-secondary" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid2">
                                <label class="" for="listGroupRadioGrid2">
                                <strong class="text-secondary">AD</strong>
                                </label>
                            </span>
                        
                            <span class="me-2"> 
                                <input class="form-check-input bg-secondary" type="radio" name="listGroupRadioGrid" id="listGroupRadioGrid3">
                                <label class="" for="listGroupRadioGrid3">
                                <strong class="text-secondary">UO</strong>
                                </label>
                            </span>
                        </div> 

                        <a href="#" class="btn btn-sm btn-outline-secondary" style="font-size: 16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            Ajoutez un Site
                        </a>
                    </div>
                </div>
                <section class="border border-2 border-secondary rounded-1 bg bg-dark">          
                    <div class="table-responsive">   
                        <table class="table table-dark table-striped table-hover table-responsive">
                            <thead class="bg-dark text-light border-bottom border-4 border-secondary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Référence</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once __DIR__ . "/../includes/MariaDB.php";// Non finit
                                $conn = Connexion::getDB()->get();
                                
                                $sql;
                                if (!$_SESSION['Admin']) {
                                    $sql = "SELECT * FROM Site WHERE (ID_Site = Any (SELECT ID_Site FROM Gerer WHERE ID_User = ".$_SESSION['User']['ID_User'].") OR ID_Dr = ANY (SELECT ID_Dr FROM Administrer WHERE ID_User = ".$_SESSION['User']['ID_User'].") OR ID_SiteParent = Any (SELECT ID_Site FROM Gerer WHERE ID_User = ".$_SESSION['User']['ID_User'].")) ORDER BY ID_Site ASC"; 
                                } else {
                                    $sql = "SELECT * FROM Site ORDER BY ID_Site ASC";
                                }
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                            
                                $result = $stmt->fetchAll();

                                foreach($result as $row) {

                                    echo '<tr>';
                                    
                                        echo '<th scope="row">'. $row['ID_Site'] .'</th>';
                                        if (empty($row['ID_SiteParent'])) {
                                            echo '<td>'. "AD". '</td>';
                                        } else {
                                            echo '<td>'. "UO" . '</td>';
                                        }
                                        echo '<td>'. $row['Reference'] . '</td>';
                                        echo '<td>'. $row['Adresse']. '</td>';
                                        if ($row['Statut'] == 1) {
                                            echo '<td>'. "Ouvert". '</td>';
                                        } else {
                                            echo '<td>'. "Fermé" . '</td>';
                                        }    

                                    echo '</tr>';
                                    set_time_limit(10);
                                }
                                ?>
                            </tbody>
                        </table>   
                    </div>
                <section>
            </div>                          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="lib/jquery/jquery.min.js"></script>
    <script async="" src="chrome-extension://kmhkepipobnjllejbafajoemahjejdcm/scripts/instana/eum.min.js" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>