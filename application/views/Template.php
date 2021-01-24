<!DOCTYPE HTML>
<html>
    <head>
        <title>Caisse</title>
        <link href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class=""row>
                <h1>ma tete de page</h1>
            </div>
            <?php
                if(isset($page)){
                    $this->load->view($page);
                }
            ?>
            <div class="row">
                <h1>Mon pied de page</h1>
            </div>
        </div>
    </body>

</html>