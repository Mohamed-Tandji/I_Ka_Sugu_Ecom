

<form method="post" enctype="multipart/form-data">
    <?php if (isset($data['global'])) : ?>
        <div class="alert alert-danger"><?= $data['global'] ?></div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="image" class="form-label">Image Produit</label>
        <input type="file" class="form-control" id="image" name="image" required>
        <?php if (isset($data['url_image'])) : ?>
            <div class="alert alert-danger"><?= $data['url_image'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
        <?php if (isset($data['nom'])) : ?>
            <div class="alert alert-danger"><?= $data['nom'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="decimal" class="form-control" id="prix" name="prix">
        <?php if (isset($data['prix'])) : ?>
            <div class="alert alert-danger"><?= $data['prix'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="titre" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" required>
        <?php if (isset($data['description'])) : ?>
            <div class="alert alert-danger"><?= $data['description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">

    <select class="form-select" id="nomCat" name="nomCat" for="nomCat" aria-label="Default select example">
        <option selected>Choisir Categorie</option>
        <option value="Laitier">Laitier</option>
        <option  value="Fruits">Fruits</option>
        <option value="Legumes">Legumes</option>
        <option value="Boucherie">Boucherie</option>
        <option value="Jus">Jus</option>
    </select>
         <?php if (isset($data['categorie'])) : ?>
            <div class="alert alert-danger"><?= $data['categorie'] ?></div>
        <?php endif; ?>
    </div>

    

   
    <input type="submit" value="Enregistrer" name="Enregistrer">




</form>