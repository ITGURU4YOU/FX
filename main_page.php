<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./login_page.php');
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link href="default/jquery.mobile.theme-1.4.0.css" rel="stylesheet">
<link href="default/jquery.mobile.icons-1.4.0.min.css" rel="stylesheet">
<link href="jquery.mobile.structure-1.4.0.min.css" rel="stylesheet">
<link href="Index_mobile.css" rel="stylesheet">
<link href="main_page.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.mobile-1.4.0.min.js"></script>
</head>
<body>
<div data-role="page" data-theme="a" data-title="Index" id="main_page">
<div data-role="header" id="Header2">
<h1>FLORAL EXPRESS</h1>
<a href="./index.php" data-role="button" data-icon="home" class="ui-btn-left">Home</a>
</div>
<div class="ui-content" role="main">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform" style="display:inline">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" id="Logout1" name="logout" value="Logout">
</form>

</div>
<div data-role="footer" id="Footer1" data-position="fixed"><h4>Footer</h4></div>
</div>
</body>
</html>