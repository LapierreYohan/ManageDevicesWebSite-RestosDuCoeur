<form method="POST" action="/includes/traitements/insertSite.php" enctype="multipart/form-data" style="margin: 30px 5% 0 5%;">
    <h4 class="mb-3">Informations</h4>
    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><label for="ref">Ref <p style="color: red; display: inline;">*</p></label></span>
            <input type="text" class="form-control" id="ref" name="ref" placeholder="Réference" maxlength="47" required>
        </div>
    </div>

    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><label for="marque">Marque <p style="color: red; display: inline;">*</p></label></span>
            <input type="text" class="form-control" id="marque" name="marque" placeholder="Marque" maxlength="100" required>
        </div>
    </div>

    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><label for="modele">Modèle <p style="color: red; display: inline;">*</p></label></span>
            <input type="text" class="form-control" id="modele" name="modele" placeholder="Modèle" maxlength="100" required>
        </div>
    </div>

    <div class="mb-4">
        <div class="input-group">
            <span class="input-group-text"><label for="serie">Série <p style="color: red; display: inline;">*</p></label></span>
            <input type="text" class="form-control" id="serie" name="serie" placeholder="Série" maxlength="100" required>
        </div>
    </div>

    <hr class="my-4">        
    <h4 class="mb-3">Fonctionnalité</h4>
    <div class="col mb-4">
        
        <?php
        require_once __DIR__ . "/../../includes/MariaDB.php";
        $conn = Connexion::getDB()->get();
                    
        $sql = "SELECT * FROM particularite ORDER BY ID_Fonction"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $row) {
            
            echo '<div class="mb-3 form-check" style="margin-left: 2%;">';
            
                echo '<label class="form-check-label" for="'. $row['Nom'] .'">'. $row['Nom'] .'</label>';
                echo '<input type="checkbox" class="form-check-input" id="'. $row['Nom'] .'" name="fonction'. str_replace(' ', '', $row['Nom']) .'">';

            echo '</div>';
        }
        ?>
    </div>

    <hr class="my-4">
    <h4 class="mb-3">Commentaire</h4>
    <div class="col mb-4">
        <div class="input-group">
            <span class="input-group-text"><label for="com">Com</label></span>
            <textarea class="form-control" id="com" name="com" style="height: 100px;"> </textarea>
        </div>
    </div>

    <?php if (!empty($_GET['uo'])) : ?>
        <input type="hidden" name="uo" value="<?= $_GET['uo'] ?>">
    <?php elseif (!empty($_GET['ad'])) : ?>    
        <input type="hidden" name="ad" value="<?= $_GET['ad'] ?>">
    <?php endif; ?>

    <input type="hidden" name="materiel" value="<?= $_GET['materiel'] ?>">

    <button class="w-35 btn btn-secondary btn-lg mb-4" type="submit">Ajouter une Imprimante</button>
</form>