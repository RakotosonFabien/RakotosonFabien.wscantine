<form action="<?php echo site_url('api/etudiant')?>" method="post">
  <div class="form-group row">
    <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputNom" name = "nom" placeholder="Nom">
    </div>
  </div>
    
    <div class="form-group row">
        <label for="inputETU" class="col-sm-2 col-form-label">Numero ETU</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="inputETU" name="numETU" placeholder="ETU">
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
      <label for="inputMdp" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputMdp" name = "mdp" placeholder="Mot de passe">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success">S'inscrire</button>
      </div>
    </div>
</form>
<div class="row">
    <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Accueil</a>
</div>