<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   header('Location: ./mobile_index.php');
   exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>mobile_ticket</title>
<meta name="keywords" content="delivery flowers, flowers">
<meta name="generator" content="www.ITGURU4YOU.COM - for all your internet solutions">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<style type="text/css">
html, body
{
   height: 100%;
}
div#space
{
   width: 1px;
   height: 50%;
   margin-bottom: -927px;
   float:left
}
div#container
{
   width: 320px;
   height: 1854px;
   margin: 0 auto;
   position: relative;
   clear: left;
}
body
{
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   padding: 0;
}
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
#InlineFrame1
{
   border: 0px #C0C0C0 solid;
}
#wb_logoutform
{
   background-color: #EEEEEE;
   border: 0px #878787 solid;
}
#logout
{
   border: 1px #878787 solid;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   background-color: #000000;
   color: #FFFFFF;
   font-family: Arial;
   font-weight: bold;
   font-size: 13px;
}
</style>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<iframe name="mobile_pickup" id="InlineFrame1" style="position:absolute;left:1px;top:50px;width:310px;height:1804px;z-index:1;" src="http://www.floralexpressdelivery.com/newweb/forms/mobile_forms/driver_pickup/driver_ticket.php" scrolling="no" frameborder="0"></iframe>
<div id="wb_logoutform" style="position:absolute;left:209px;top:7px;width:102px;height:36px;z-index:2;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" id="logout" name="logout" value="Logout" style="position:absolute;left:4px;top:5px;width:96px;height:25px;z-index:0;">
</form>
</div>

</div>
</body>
</html>