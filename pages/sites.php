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

</head>

<body>

    <?php require_once __DIR__ . "/../modules/header.php";?>

    <div class="container">
        <div class="wrapper">
            <h1 class="mb-4">Liste des Sites</h1>
            <section class="border border-dark border-2 rounded-1 bg bg-light">
                        
                <div class="table-responsive">   
                <table class="table table-striped table-hover table-responsive">
                    <thead>
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
                    }
                    ?>

                    </tbody>
                </table>
                                
                      
                </div>
            <section>
        </div>

        <a href="" class="btn btn-outline-success mb-5" style="margin-top: 20px;">Ajoutez un Site</a>                               
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="lib/jquery/jquery.min.js"></script>

</body>

</html>