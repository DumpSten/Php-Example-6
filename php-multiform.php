<?php

function form_filter($post)
{
    return is_array($post) ? array_map('form_filter', $post) : htmlspecialchars(trim($post));
}

$_POST = array_map('form_filter', $_POST);

function post($name)
{
    if (isset($_POST[$name]))
        return $_POST[$name];
}

// login if posted
if (post('login'))
{
    print_r($_POST);
}

// register if posted
if (post('register'))
{
    print_r($_POST);
}

?>

<form action="" method="post">
    <h3>Login</h3>
    User name: <br>
    <input type="text" name="dump"> <hr>
    Password: <br>
    <input type="password" name="password"> <br>
    <input type="hidden" name="login" value="1">
    <button type="submit">Login</button>
</form>

<hr>

<form action="" method="post">
    <h3>Register</h3>
    User name: <br>
    <input type="text" name="dump"> <hr>
    Password: <br>
    <input type="password" name="password"> <br>
    E-mail: <br>
    <input type="text" name="email"> <hr>
    <input type="hidden" name="register" value="1">
    <button type="submit">Register</button>
</form>