<?php
// wap phpmyadmin
// ionutvmi@gmail.com
// master-land.net
header("Content-type: text/html; charset=iso-8859-1");
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $pma->title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $pma->tpl;?>style/style.css?<?php echo time(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">
<meta content="yes" name="apple-mobile-web-app-capable">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>	
<div class='header'> 
<div style='padding:5px;'><a href='index.php'>Wap PhpMyAdmin</a><br/>
<?php echo $pma->host ? htmlentities($pma->user."@".$pma->host) : '';?>
</div>

<?php if ($pma->host): ?>
<div class='subh'>
<span class='<?php echo $issql ? "selected" : "";?>'><a href='sql.php?<?php echo $_SERVER['QUERY_STRING']; ?>'>&nbsp;<?php echo $lang->Sql;?> </a></span> &nbsp; <span class='<?php echo $isexport ? "selected" : "";?>'><a href='export.php?<?php echo $_SERVER['QUERY_STRING']; ?>'>&nbsp;<?php echo $lang->Export;?> </a></span> &nbsp; <span class='<?php echo $isimport ? "selected" : "";?>'><a href='import.php?<?php echo $_SERVER['QUERY_STRING']; ?>'>&nbsp;<?php echo $lang->Import;?> </a>&nbsp;</span>
</div>
<?php endif; ?>
</div>
<div class='content'>