<div class="cleaner">
<form method="POST" action="index.php?action=terminaux_utilisateur">
    <h5>Entrer le numéro de série du terminal (un nombre)</h5>
<input type="text" name="numserie"/>
    <?php
        getModele($conn);//crée le select pour le modele
    ?>
    <input class="btn" type="submit"/>
</form>
</div>