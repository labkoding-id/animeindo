
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function wordFilter($text)
{
    $ambilkata = $text;
    
    // //open element
    $ambilkata = str_replace('<div class="rapi">', '', $ambilkata);
    $ambilkata = str_replace('<div class="venz">', '', $ambilkata);
    $ambilkata = str_replace('<ul>', '<div class="row">', $ambilkata);
    $ambilkata = str_replace('<div class="kover">', '<div class="col-md-4">', $ambilkata);
    $ambilkata = str_replace('detpost', 'card mb-4 shadow-sm', $ambilkata);
    $ambilkata = str_replace('class="content', 'class="content content-anime', $ambilkata);

    $ambilkata = str_replace('</p>', '</span>', $ambilkata);
    $ambilkata = str_replace('<p>', '<span class="desc">', $ambilkata);

    $ambilkata = str_replace('Check More Anime', 'Cekwewe', $ambilkata);
    $ambilkata = str_replace('For more Episodes', 'sdsdsds', $ambilkata);

    

    //openurl
    $ambilkata = str_replace('" title=', '" rel="nofollow" title=', $ambilkata);
    $ambilkata = str_replace('href="https://anitoki.web.id/?p=', 'href="'.base_url().'steal/get/', $ambilkata);
    $ambilkata = str_replace('https://anitoki.web.id/?p=', '', $ambilkata);
    
    return $ambilkata;
}

$form = '<form action="get.php" method="get">
<input type="hidden" style="width:40%;" name="id"><br>
<input type="hidden" name="fansub">
</center>
</form>';

