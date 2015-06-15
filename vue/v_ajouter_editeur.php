<form name="myForm" action="index.php?action=contenu_administrateur" method="POST"
      onsubmit="return validateForm()">
    <table >
        <tr><td>Nom:      </td><td><input type="text" name="nom"/>    </td></tr>
        <tr><td>Contact:  </td><td><input type="text" name="contact"/></td></tr>
        <tr><td>URL:      </td><td><input type="text" name="url"/>    </td></tr>
        <tr><td><input onclick="test()" class="btn" type="submit"/></td></tr>
    </table>

</form>
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["nom"].value;
    var y = document.forms["myForm"]["contact"].value;
    var z = document.forms["myForm"]["url"].value;
    if (x == null || x == "") {
        alert("Veuillez entrer un nom");
        return false;
    } else if (y == null || y == "") {
        alert("Veuillez entrer un contact");
        return false;
    } else if (z == null || z == "") {
        alert("Veuillez entrer un URL");
        return false;
    }

    return true
}
</script>
