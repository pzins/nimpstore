<form name="myForm" action="index.php?action=contenu_administrateur"
      method="POST" onsubmit="return validateForm()">
    <table >
        <tr>
            <td> Client</td>
            <td>
                <select name="client">
                    <?php
                        getClientForm($conn);
                    ?>
                </select>
            </td>
        </tr>
        <tr><td>Montant:</td>
            <td><input type="text" name="montant"/></td>
        </tr>
        <tr><td>Date validité:</td><td>
                <input type="date" name="validite">
        </td>
        </tr>
        <tr><td><input type="submit"/></td></tr>
    </table>

</form>
<script type="text/javascript">
    function validateForm() {
        var x = document.forms["myForm"]["montant"].value;
        if (x == null || x == "" ) {
            alert("Veuillez entrer un montant");
            return false;
        }
        return true;
    }
</script>
