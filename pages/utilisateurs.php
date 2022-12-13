<?php
require_once("../includes/fonctions/auth.php");
redirectUser();
?>

<html lang="fr">

<head>
    <?php require_once __DIR__ . "/../modules/head.php"; ?>

    <link href="/css/style.css" rel="stylesheet">
    <title>Utilisateurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <?php require_once __DIR__ . "/../modules/header.php";?>

    <div class="container">
        <div class="wrapper">
            <h1 class="mb-4">Liste d'Utilisateurs</h1>
            <section class="border border-dark border-2 rounded-1 bg bg-light">
                        
                <div class="table-responsive">   
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Référence</th>
                            <th scope="col">Nom Prénom</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    
                    require_once __DIR__ . "/../includes/MariaDB.php";// Non finit
                    $conn = Connexion::getDB()->get();
                    

                    $sql = "SELECT * FROM utilisateur ORDER BY ID_User"; 
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                
                    $result = $stmt->fetchAll();

                    foreach($result as $row) {

                        echo '<tr>';
                        
                            echo '<th scope="row">'. $row['ID_User'] .'</th>';
                            echo '<td>'. $row['Reference_User'] . '</td>';
                            echo '<td>'. $row['Nom']. " " . $row['Prenom'] . '</td>';
                            echo '<td>'. $row['Mail'] . '</td>';          

                            $value;
                            if ($row['Admin_User'] == true) {
                                $value = "Administrateur";
                            } else {
                                $value = "Utilisateur";
                            }

                            echo '<td>'. $value . '</td>';   
                        echo '</tr>';
                    }
                    ?>

                    </tbody>
                </table>
                                
                      
                </div>
            <section>
        </div>

        <a href="/pages/addUser.php" class="btn btn-outline-success mb-5" style="margin-left: 18px;">Ajoutez un Utilisateur</a>                               
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="lib/jquery/jquery.min.js"></script>

    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/common-scripts.js"></script>  
</body>

</html>