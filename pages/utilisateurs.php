
<div class="wrapper ms-5" style="width: 90%;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="resetSelector">Liste des utilisateurs</h1>
        <div class="btn-toolbar mb-1 mb-md-0">
            <a href="/pages/addUser.php" class="btn btn-sm btn-outline-secondary" style="font-size: 16px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                Ajoutez un Utilisateur
            </a>
        </div>
    </div>
    <section class="border border-secondary border-2 rounded-1 bg bg-dark">
                
        <div class="table-responsive">   
            <table class="table table-dark table-striped table-hover table-responsive">
                <thead class="bg-dark text-light border-bottom border-4 border-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Référence</th>
                        <th scope="col">Nom Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Créateur</th>
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

                    foreach($result as $row) { //"/pages/profil.php?id='. $row['ID_User'] .'"
                        echo '<tr class="trList" onclick= "document.location = \'/pages/profil.php?id='. $row['ID_User'] .'\'; ">';
                        
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
                                echo '<td>'. $row['ID_Author'] . '</td>';  
                            echo '</tr>';
                        }
                        ?>
                </tbody>
            </table>                 
        </div>
    <section>
</div>      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="lib/jquery/jquery.min.js"></script>
