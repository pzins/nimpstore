<h1>Connexion Administrateur</h1>
<form name="myForm" method="POST" action="index.php?action=contenu_administrateur"
      onsubmit="return validateForm()">
    <table>
        <tr><td>Login : </td><td><input type="text" name="login"/></td></tr>
        <tr><td>Password : </td><td><input type="text" name="password"/></td></tr>
        <tr><td><input type="submit"/></td></tr>
    </table>
</form>

<script type="text/javascript">
    function validateForm() {
        var x = document.forms["myForm"]["login"].value;
        var y = document.forms["myForm"]["password"].value;
        if (x == null || x == "") {
            alert("Veuillez entrer votre login");
            return false;
        } else if (y == null || y == "") {
            alert("Veuillez entrer votre mot de passe");
            return false;
        }
        return true
    }
</script>