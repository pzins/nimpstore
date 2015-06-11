<form action="index.php?action=contenu_administrateur" method="POST">
    <table >
        <tr>
            <td>
                <select name="type" id="type" onchange="hide()">
                    <option value="a">Application</option>
                    <option value="r">Ressource</option>
                </select>
            </td>
        </tr>
        <tr><td>Titre:          </td><td><input type="text" name="titre"/>          </td></tr>
        <tr><td>Description:    </td><td><input type="text" name="description"/>    </td></tr>
        <tr><td>Cout fixe:      </td><td><input type="text" name="coutfixe"/>       </td></tr>
        <?php
            getEditeur($conn);
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

        <tr><td><input type="submit"/></td></tr>
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
</script>
