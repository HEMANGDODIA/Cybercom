<?php ob_start();?>
<h1>hello</h1>
<?php
$redirect_page='http://google.co.uk';
$redirect=true;

if ($redirect==true) {
    header('Location: '.$redirect_page);
}

ob_end_clean();
?>