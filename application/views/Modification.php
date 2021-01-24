<?php if(isset($etudiant)){
    ?>
<div class="row">
    <h2>Modification de votre profil</h2>
</div>
<form action="<?php echo site_url('api/etudiant/'.$etudiant->getId()); ?>" method="post">
    <input name="_method" type="hidden" value="put">
<div class="form-group row">
        <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputNom" name="nom" placeholder="Nom">
        </div>
    </div>
   
    <div class="form-group row">
        <div class="form-group">
                        <label for="exampleInputEmail1">Date de naissance</label><br>
                        <select class="custom-select col-md-4" name="jour">
                            <option selected>Jour</option>
                            <?php 
                            $indiceJour = 1; $indiceMois = 0;$indiceAnnee = 2010;
                            while($indiceJour<=31){ ?>
                            <option value="<?php echo $indiceJour; ?>"><?php echo $indiceJour; ?></option>
                            <?php $indiceJour++; } ?>
                        </select>
                        <select class="custom-select col-md-3" name="mois">
                            <option selected>Mois</option>
                            <?php while($indiceMois<12){ ?>
                            <option value="<?php echo $indiceMois; ?>"><?php echo $allMonths[$indiceMois]; ?></option>
                            <?php $indiceMois ++; } ?>
                           
                        </select>
                        <select class="custom-select col-md-4" name="annee">
                            <option selected>Annee</option>
                            <?php while($indiceAnnee>1970){ ?>
                            <option value="<?php echo $indiceAnnee; ?>"><?php echo $indiceAnnee; ?></option>
                            <?php $indiceAnnee--; } ?>
                        </select>
                    </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success">Valider les modifications</button>
      </div>
    </div>
</form>
<?php 
    }else{
        echo 'Non connecte';
    }
?>
