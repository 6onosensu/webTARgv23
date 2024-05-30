<?php include('konf.php'); ?>
<?php
session_start();
global $yhendus;
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $cool = 'super';
    $kryp = crypt($pass, $cool);
    $paring=$yhendus->prepare("SELECT user_login, user_password, onAdmin FROM users WHERE user_login=? AND user_password=?");
    $paring->bind_param("ss", $login, $kryp);
    $paring->bind_result($user_login, $parool, $onAdmin);
    $paring->execute();

    if ($paring->fetch() && $parool=$kryp) {
        $_SESSION['user_login'] = $login;
        if($onAdmin==1) {
            $_SESSION['admin'] = true;
        }
        header('Location: home.php');
        $yhendus->close();
    } else {
        echo "kasutaja või parool on vale";
        $yhendus->close();
    }
}
?>
<h2>LogIn</h2>
<form action="" method="post" id="loginform">
    <table>
        <tr>
            <td><label for="login">Login:</label></td>
            <td><input type="text" name="login" id="login"></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="LogIn"></td>
        </tr>
    </table>
</form>
<p>login: admin, password: admin; Can see: </p>
<p>login: intern_darja, password: intern; Can see: </p>
