<form action="<?php echo site_url('welcome/authentification')?>" method="post">
    <div class="form-group row">
        <label for="inputETU" class="col-sm-2 col-form-label">Numero ETU</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="inputETU" name="numETU" placeholder="ETU">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputMdp" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputNom" name = "mdp" placeholder="Nom">
        </div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success">Se connecter</button>
      </div>
    </div>
</form>
<div class="row">
    <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Accueil</a>
</div>