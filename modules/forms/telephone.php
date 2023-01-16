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
            <span class="input-group-text"><label for="disque">Disque <p style="color: red; display: inline;">*</p></label></span>
            <input type="text" class="form-control" id="disque" name="disque" placeholder="Disque" maxlength="100" required>
        </div>
    </div>

    <hr class="my-4">        
    <h4 class="mb-3">La RAM</h4>
    <div class="col mb-4">
        
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="4G">4G</label>
            <input type="radio" class="form-check-input" id="4G" name="ram" value="4G">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="8G">8G</label>
            <input type="radio" class="form-check-input" id="8G" name="ram" value="8G">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="16">16G</label>
            <input type="radio" class="form-check-input" id="16G" name="ram" value="16G">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="32">32G</label>
            <input type="radio" class="form-check-input" id="32G" name="ram" value="32G">
        </div>
        <div class="mb-3 form-check" style="margin-left: 2%;">
            <label class="form-check-label" for="autre">Autres</label>
            <input type="radio" class="form-check-input" id="autre" name="ram" value="">
            <input type="text" class="form-input" name="autreram">
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

    <button class="w-35 btn btn-secondary btn-lg mb-4" type="submit">Ajouter un Serveur</button>
</form>