
<div class="container text-center">
    <br><br><br>
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
    <?php foreach($lstProduits as $produit):?>


        <div class="card mb-3 mx-3" style="width: 18rem;">
            <img src="<?= ROOTDOMAINE.$produit['url_image'];?>" width="60" height="130" class="card-img-top" style="border: 2px solid #ccc;" alt="produit">
            <div class="card-body">
                <h3 class="card-title"><?= $produit['nom'] ?> </h3>
                <h5 class="card-subtitle mb-2 text-body-secondary"><?= $produit['prix'] ?> $</h5>
                <p class="card-text"><?= $produit['description'] ?></p>
                <form method="get">
                    <a type="submit" name="ajouterPanier" class="btn btn-warning" href="<?= ROOTDOMAINE."paniers/ajouterPanier/".$produit['id'];?>">Acheter</a>
                </form>
                <form method="get">
                    <a type="submit" name="ajouterPanier" class="btn btn-primary" href="<?= ROOTDOMAINE."paniers/ajouterPanier/".$produit['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg></a>
                </form>
            </div>
        </div>
        
        
    <?php endforeach; ?>


</div>