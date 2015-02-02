<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   header('Location: ./index1.php');
   exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Page</title>
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
   margin-bottom: -895px;
   float:left
}
div#container
{
   width: 320px;
   height: 1791px;
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
#InlineFrame2
{
   border: 1px #000000 solid;
}
#Image1
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
</style>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<iframe name="mobile_driver_ticket" id="InlineFrame2" style="position:absolute;left:0px;top:54px;width:309px;height:1735px;z-index:0;" src="http://www.floralexpressdelivery.com/newweb/forms/mobile_forms/driver_ticket/ticket.php" scrolling="no" frameborder="0"></iframe>
<div id="wb_Image1" style="position:absolute;left:284px;top:5px;width:28px;height:26px;z-index:1;">
<img src="images/lock-icon-1005063647.png" id="Image1" alt=""></div>

</div>
</body>
</html>