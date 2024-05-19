<?php 
    include('simple_html_dom.php');

    $html = file_get_html('https://www.tasteofhome.com/collection/these-5-ingredient-dinners-will-save-your-weeknights/');

    echo $html;

?>