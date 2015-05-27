<form action="index.php?action=contenu_administrateur" method="POST">
    <select name="type" id="type" onchange="hide()">
        <option value="a">Application</option>
        <option value="r">Ressource</option>
    </select><br/>
    Titre: <input type="text" name="titre"/><br/>
    Description: <input type="text" name="description"/><br/>
    Cout fixe: <input type="text" name="coutfixe"/><br/>
        <?php
        getEditeur($conn);
    ?>
    <p id="cp">Cout periodique:<input type="text" name="coutperiodique"/></p>
    <p id="ab" style="display: none">
        Application de base: <input type="text" name="applibase"/></p>

    <input type="submit"/>
</form>
<script type="text/javascript">
    function hide(){
        if(document.getElementById('cp').style.display == 'none')
        {
            document.getElementById('cp').style.display = 'block';
            document.getElementById('ab').style.display = 'none';
        }
        else
        {
            document.getElementById('ab').style.display = 'block';
            document.getElementById('cp').style.display = 'none';
        }
    }
</script>
