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
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="nb">Noir et Blanc</label>
            <input type="checkbox" class="form-check-input" id="nb" name="fonctionNoirBlanc">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="couleur">Couleurs</label>
            <input type="checkbox" class="form-check-input" id="couleur" name="fonctionCouleur">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="scanner">Scanner</label>
            <input type="checkbox" class="form-check-input" id="scanner" name="fonctionScanner">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="copieur">Copieur</label>
            <input type="checkbox" class="form-check-input" id="copieur" name="fonctionCopieur">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="3d">3 Dimensions</label>
            <input type="checkbox" class="form-check-input" id="3d" name="fonction3d">
        </div>
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