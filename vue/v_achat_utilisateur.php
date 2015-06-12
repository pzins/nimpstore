<form action="index.php?action=terminaux_utilisateur"
      method="POST">
    <table >
        <tr>
            <td>
                <select name="typeAchat" onchange="hide()">
                    <option value="a">Application</option>
                    <option value="r">Ressource</option>
                </select>
            </td>
        </tr>
        <tr id="a"><td>Client:      </td><td><select name="achatClient">
        <?php
        session_start();
        $login = $_SESSION['login'];
        getClientForm($conn);
        ?></select></td></tr>
        <tr id="a"><td>Titre:      </td><td><select name="achatApp">
        <?php

            getAppliDispoForm($login, $conn);
        ?></select></td></tr>
        <tr id="r" style="visibility: hidden">
            <td>Titre:      </td><td><select name="achatRes">
        <?php
        getRessourceForm($conn);
        ?></select></td></tr>
        <tr><td><input type="submit"/></td></tr>
    </table>

</form>
<script type="text/javascript">
    function hide(){
        if(document.getElementById('a').style.visibility == 'hidden')
        {
            document.getElementById('a').style.visibility = 'visible';
            document.getElementById('r').style.visibility = 'hidden';
        }
        else
        {
            document.getElementById('r').style.visibility = 'visible';
            document.getElementById('a').style.visibility = 'hidden';
        }
    }
</script>
