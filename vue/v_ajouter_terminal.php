<div class="cleaner">
<form method="POST" action="index.php?action=terminaux_utilisateur">
<input type="text" name="numserie"/>
    <?php
        getModele($conn);//crée le select pour le modele
    ?>
    <input type="submit"/>
</form>
</div>