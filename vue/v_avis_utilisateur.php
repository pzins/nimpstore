

<form action="index.php?action=terminaux_utilisateur"
      method="POST">
    <table >
        <tr><td>Application</td><td><select name="app">
        <?php
        session_start();
            $login = $_SESSION['login'];
            getApplicationClientForm($conn, $login);
        ?></select></td></tr>
        <tr><td>Note</td><td>
        <select name="note">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select></td></tr>
        <tr><td>Commentaire</td><td>
        <textarea name="com" rows="10" cols="50">
        </textarea></td></tr>
        <tr><td><input type="submit"/></td></tr>
</table>

</form>