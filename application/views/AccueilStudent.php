<?php
    if(!isset($etudiant)){
        echo 'non connecte!';
    }else{
?>
<div class="row">
    <div class="alert alert-success" role="alert">
        Bienvenue <?php echo $etudiant->getNom();?>
    </div>
</div>
<div class="row">
    <ul class="list-group list-group-horizontal-md">
        <li class="list-group-item"><a class="nav-link active" href="<?php echo site_url('welcome/modification');?>">Modifier compte</a></li>
    </ul>
    <ul class="list-group list-group-horizontal-md">
        <li class="list-group-item">
            <form action="<?php echo site_url('api/commande');?>" method="post">
                <input type='hidden' name='idEtudiant' value="<?php echo $etudiant->getId(); ?>">
                <li class="list-group-item"><button type="submit" class="nav-link active" >Faire une commande</button></li>
            </form>
        </li>
    </ul>
</div>
<?php } ?>

