<?php

    // $_POST

    //print_r($_POST);

    //echo $_POST['name'];

    // strip_tags()
    // htmlspecialchars()
    // trim()

    /*
    if (trim($_POST['about me']) == ''){
        echo 'please write something about you.';
    } else {
        print_r($_POST);
    }
    */

    //$aboutme = htmlspecialchars($_POST['about me']);
    //echo htmlspecialchars_decode($aboutme);

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

    echo post('about me');

?>