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

if (post('submit')){

    print_r($_POST);

}

?>
<form action="send.php" method="post" enctype="multipart/form-data">

<!--

    input
    textarea
    file
    select
    radio
    checkbox
    multiple select
    button

-->

name: <br>
<input type="text"  readonly value="alper çatal" name="name">
<hr>
about me : <br>
<textarea name="about me" cols="50" placeholder="please write something about you." rows="5"><?php echo post('about_me'); ?></textarea>
<hr>
jobs : <br>
<select name="job" >
    <option >-- chose --</option>
    <option <?php echo post('job') == 'web-developer' ? ' selected' : null ?> value="web-developer">Web developer</option>
    <option <?php echo post('job') == 'front-end-developer' ? ' selected' : null ?> value="front-end-developer">Front end developer</option>
    <option <?php echo post('job') == 'back-end-developer' ? ' selected' : null ?> value="back-end-developer">Back end developer</option>
</select>
<hr>
Gender : <br>
<input type="radio" name="gender" value="men">
men 
<input type="radio" name="gender" value="women">
women
<hr>
areas of interest : <br>
<label>
    <input type="checkbox" <?php echo post('areas_of_interest') && in_array('php', post('areas_of_interest')) ? ' checked' : null ?> name="areas of interest[]" value="php">PHP
</label>
<label>
    <input type="checkbox" <?php echo post('areas_of_interest') && in_array('html', post('areas_of_interest')) ? ' checked' : null ?> name="areas of interest[]" value="html">HTML
</label>
<label>
    <input type="checkbox" <?php echo post('areas_of_interest') && in_array('css', post('areas_of_interest')) ? ' checked' : null ?> name="areas of interest[]" value="css">CSS
</label>
<hr>
photograph : <br>
<input type="file" name="photograph">
<hr>
jobs : <br>
<select name="job2[]" multiple size="4" >
    <option >-- chose --</option>
    <option value="web-developer">Web developer</option>
    <option value="front-end-developer">Front end developer</option>
    <option value="back-end-developer">Back end developer</option>
</select>
<hr>
<input type="hidden" name="submit" value="1">
<button type = "submit">Send</button>
</form>