<?php
include "enc.php";

$login_iden = fopen("iden.txt", "r") or die("Unable to open file!");
$login_data = fread($login_iden,filesize("iden.txt"));
fclose($login_iden);
$login_data = explode("\n", $login_data);
$login_data = array_map(function($row) {
    return explode(",", $row);
}, $login_data);
$login_data = array_map(function($row) {
    return [
        'username' => $row[0],
        'password' => $row[1],
    ];
}, $login_data);

$dec_password = "himarewards1_uajy_2022";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = false;
    foreach ($login_data as $key => $value) {
        if (decrypt($value['password'], $dec_password) == $password && decrypt($value['username'], $dec_password) == $username) {
            $login = true;
            break;
        }
    }
    if ($login) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo "Username atau password salah";
    }
}
?>
