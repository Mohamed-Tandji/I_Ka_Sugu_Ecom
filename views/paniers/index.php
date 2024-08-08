



<?php if(isset($listPaniers)){
   ?>


<a type="submit" name="modifier" class="btn btn-danger" href="<?= ROOTDOMAINE."paniers/ViderPanier/";?>">Vider </a>

<?php foreach($listPaniers as $produit):?>


<div class="card mb-3 mx-3" style="width: 18rem;">
            <img src="<?= ROOTDOMAINE.$produit['url_image'];?>" width="60" height="130" class="card-img-top" style="border: 2px solid #ccc;" alt="produit">
            <div class="card-body">
                <h3 class="card-title"><?= $produit['nom'] ?> </h3>
                <h5 class="card-subtitle mb-2 text-body-secondary"><?= $produit['prix'] ?> $</h5>
                <h5 class="card-subtitle mb-2 text-body-secondary"><input type="number" class="form-control" id="quantiteProduit" name="quantiteProduit" value="<?= $produit['Quantite'] ?>" placeholder="Quantité">
 </h5>
                <p class="card-text"><?= $produit['description'] ?></p>
                <form method="get">
                    <a type="submit" name="ajouterPanier" class="btn btn-warning" href="<?= ROOTDOMAINE."paniers/ajouterPanier/".$produit['id'];?>">Payer</a>
                </form>
                
            </div>
        </div>


<?php endforeach; 
}else{?>
   <h2> Votre Panier est vide pour le moment <h2>
    <?php }?><br>