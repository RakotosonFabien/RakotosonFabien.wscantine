<form action="<?php echo site_url('api/commandesxplats');?>" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="inputIdPlat">Plat</label>
            <select class="col-sm-10" name="idPlat" id="inputIdPlat">
                <?php foreach($allPlats as $plat){ ?>
                <option value="<?php echo $plat->getId(); ?>"><?php echo $plat->getNom()."-".$plat->getPrix()." Ariary"; ?></option>
                <?php } ?>
            </select>
        </div>
        
        
        <div class="form-group row">
            <label for="inputQuantite" class="col-sm-2 col-form-label">Quantite</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputQuantite" name="quantite" placeholder="quantite">
            </div>
        </div>
            <input type="hidden" name="idCommande" value="<?php echo $idCommande; ?>">
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-success">Ajouter plat</button>
            </div>
        </div>
   
</form>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Plats</th>
      <th scope="col">Quantite</th>
      <th scope="col">PU</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($allCommandes->result_array() as $row){?>
    <tr>
      <th scope="row"><?php echo $row['nom']; ?></th>
      <td><?php echo $row['quantite']; ?></td>
      <td><?php echo $row['prix']; ?></td>
      <td><?php echo $row['total']; ?></td>
    </tr>
      <?php } ?>
  </tbody>
  
</table>
<div class="row">
    <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Accueil</a>
</div>



