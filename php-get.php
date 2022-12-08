<?php

// in the search section
// member registration
// member-edit.php?id=5
//key=value&key=value
//?word=alper&id=5

function form_filter($post)
{
    return is_array($post) ? array_map('form_filter', $post) : htmlspecialchars(trim($post));
}

$_GET = array_map('form_filter', $_GET);
$_REQUEST = array_map('form_filter', $_REQUEST);

function get($name)
{
    if (isset($_GET[$name]))
        return $_GET[$name];
}

function request($name)
{
    if (isset($_REQUEST[$name]))
        return $_REQUEST[$name];
}

/*
$id = (int) get('id');

if (!is_int($id) || !$id){
    echo 'ID must be number only';
    exit;
}
*/

//echo get('deneme');

//print_r($_REQUEST);

echo request('word');

?>

<form action="php-get.php?id=5" method="post">

    Arama:
    <input type="text" value="<?php echo get('word') ?>" name="word">
    <hr>

</form>