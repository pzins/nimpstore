<table>
<form name="myForm" action="index.php?action=terminaux_utilisateur"
      method="POST" onsubmit="return validateForm()">
    <tr><td>Nom: </td><td><input type="text" name="nom"/></td></tr>
    <tr><td>Prenom: </td><td><input type="text" name="prenom"/></td></tr>
    <tr><td>Mail: </td><td><input type="text" name="mail"/></td></tr>
    <tr><td>Login: </td><td><input type="text" name="login"/></td></tr>
    <tr><td>Mot de passe(6 carac. min): </td><td><input type="password" name="mdp"/></td></tr>
    <tr><td><input type="submit"/></td></tr>
</form>
</table>

<script>
    function validateForm() {
        var x = document.forms["myForm"]["nom"].value;
        var y = document.forms["myForm"]["prenom"].value;
        var z = document.forms["myForm"]["mail"].value;
        var v = document.forms["myForm"]["login"].value;
        var w = document.forms["myForm"]["mdp"].value;
        if (x == null || x == "" ) {
            alert("Veuillez entrer votre nom");
            return false;
        }else if (y == null || y == "") {
            alert("Veuillez entrer votre prenom");
            return false;
        }else if (z == null || z == "") {
            alert("Veuillez entrer votre mail");
            return false;
        }else if (v == null || v == "") {
            alert("Veuillez entrer un login");
            return false;
        }else if (w == null || w == "") {
            alert("Veuillez entrer un mot de passe");
            return false;
        }else if (w.length < 6) {
            alert("Mot de passe : 6 caractères minimum");
            return false;
        }else if(!isEmail(z))
        {
            alert("Mail invalide");
            return false;
        }
        return true;
    }

    function isEmail(myVar){
        var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

        return regEmail.test(myVar);
    }
</script>