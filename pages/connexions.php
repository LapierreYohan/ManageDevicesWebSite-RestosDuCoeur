<div class="wrapper ms-5" style="width: 90%;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="resetSelector">Liste des Connexions</h1>
        <div class="btn-toolbar mb-1 mb-md-0">
            <a href="/pages/addConnexion.php" class="btn btn-sm btn-outline-secondary" style="font-size: 16px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-text-bottom" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                Ajoutez une Connexion
            </a>
        </div>
    </div>
    <section class="border border-secondary border-2 rounded-1 bg bg-dark">
        <div class="table-responsive">   
            <table class="table table-dark table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                
                require_once __DIR__ . "/../includes/MariaDB.php";// Non finit
                $conn = Connexion::getDB()->get();
                

                $sql = "SELECT * FROM connexion ORDER BY ID_Connexion"; 
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            
                $result = $stmt->fetchAll();

                foreach($result as $row) {

                    echo '<tr>';
                    
                        echo '<th scope="row">'. $row['ID_Connexion'] .'</th>';
                        echo '<td>'. $row['Nom'] . '</td>';
    
                    echo '</tr>';
                }
                ?>

                </tbody>
            </table>      
        </div>
    <section>
</div>
