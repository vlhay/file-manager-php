</div>
<div class='footer'>

<?php
if ($pma->host) {
    echo "<a href='files.php?" . ($db_name ? "db=".urlencode($db_name) : "") . "'>$lang->Files</a>
    | <a href='action.php?act=logout'> $lang->logout </a><hr size='1px'>";
}
?>

<a href='docs.php'><?php echo $lang->docs;?> </a></div>
</body>
</html>
