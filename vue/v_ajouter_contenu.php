<form name="myForm" action="index.php?action=contenu_administrateur"
      method="POST" onsubmit="return validateForm()">
    <table >
        <tr>
            <td>
                <select name="type" id="type" onchange="hide()">
                    <option value="a">Application</option>
                    <option value="r">Ressource</option>
                </select>
            </td>
        </tr>
        <tr><td>Titre:      </td><td><input type="text" name="titre"/></td></tr>
        <tr><td>Description:</td><td><input type="text" name="description"/></td></tr>
        <tr><td>Cout fixe:  </td><td><input type="text" name="coutfixe"/></td></tr>
        <?php
            getEditeur($conn);
            getOs($conn);
        ?>

        <tr id="cp">
            <td> Cout periodique:</td>
            <td><input type="text" name="coutperiodique"/></td>
        </tr>
        <tr id="ab" style="visibility: hidden">
            <td>Application de base:</td>
            <td><select name="applibase" >
                    <?php getApplications($conn);?>
                </select>
            </td>
        </tr>

        <tr><td><input onclick="test()" type="submit"/></td></tr>
    </table>

</form>
<script type="text/javascript">
    function hide(){
        if(document.getElementById('cp').style.visibility == 'hidden')
        {
            document.getElementById('cp').style.visibility = 'visible';
            document.getElementById('ab').style.visibility = 'hidden';
        }
        else
        {
            console.log('ol');
            document.getElementById('ab').style.visibility = 'visible';
            document.getElementById('cp').style.visibility = 'hidden';
        }
    }
    function validateForm() {
        var x = document.forms["myForm"]["titre"].value;
        var y = document.forms["myForm"]["description"].value;
        var z = document.forms["myForm"]["coutfixe"].value;
        var w = document.forms["myForm"]["coutperiodique"].value;
        if (x == null || x == "" ) {
            alert("Veuillez entrer un titre");
            return false;
        }else if (y == null || y == "") {
            alert("Veuillez entrer une description");
            return false;
        }
        if (z == null || z == "" || isNaN(z)){
            document.forms["myForm"]["coutfixe"].value = 0;
        }
        if (w == null || w == "" || isNaN(w)){
            document.forms["myForm"]["coutperiodique"].value = 0;
        }
        return true;
    }
</script>
