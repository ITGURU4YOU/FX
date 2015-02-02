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
<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./mobile_login_page.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./mobile_login_page.php');
      exit;
   }
}
if (session_id() == "")
{
   session_start();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>mobile_main_page</title>
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
   margin-bottom: -273px;
   float:left
}
div#container
{
   width: 320px;
   height: 547px;
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
#LoginName2
{
   color: #000000;
   font-family: Arial;
   font-size: 16px;
   text-align: left;
}
#wb_CssMenu2
{
   border: 0px #C0C0C0 solid;
   background-color: transparent;
}
#wb_CssMenu2 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
   width: 250px;
}
#wb_CssMenu2 li
{
   float: left;
   margin: 0;
   padding: 0px 0px 15px 0px;
   width: 250px;
}
#wb_CssMenu2 a
{
   display: block;
   color: #FFFFFF;
   border: 1px #C0C0C0 solid;
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
   border-radius: 10px;
   background-color: #008000;
   background-image: none;
   font-family: Arial;
   font-size: 13px;
   font-weight: bold;
   font-style: normal;
   text-decoration: none;
   width: 238px;
   height: 43px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 43px;
   text-align: center;
}
#wb_CssMenu2 li:hover a, #wb_CssMenu2 a:hover
{
   color: #800000;
   background-color: #FFFF00;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu2 .firstmain a
{
   margin-top: 0px;
}
#wb_CssMenu2 li.lastmain
{
   padding-bottom: 0px;
}
#wb_CssMenu2 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#wb_TextMenu1
{
   background-color: transparent;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
}
#wb_TextMenu1 span
{
   margin: 0 4px 0 0px;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: center;
}
#wb_Text2 div
{
   text-align: center;
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
#wb_logoutform
{
   background-color: #EEEEEE;
   border: 0px #878787 groove;
}
</style>
</head>
<body>
<div id="space"><br></div>
<div id="container">

<div id="wb_LoginName2" style="position:absolute;left:10px;top:54px;width:242px;height:29px;z-index:2;">
<span id="LoginName2">Welcome <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['fullname'];
}
else
{
   echo 'Not logged in';
}
?>!</span></div>
<div id="wb_CssMenu2" style="position:absolute;left:29px;top:130px;width:250px;height:249px;z-index:3;">
<ul>
<li class="firstmain"><a href="./mobile_ticket.php" target="_self">Ticket&nbsp;Confirmaton&nbsp;&amp;&nbsp;Payroll&nbsp;Entry</a>
</li>
<li><a href="./mobile_pickup.php" target="_self">Pickups&nbsp;Only</a>
</li>
<li><a href="./mobile_driver_payroll.php" target="_self">Check&nbsp;Your&nbsp;Payroll</a>
</li>
<li><a href="#" target="_self">Upload&nbsp;Ticket</a>
</li>
</ul>
<br>
</div>
<div id="wb_TextMenu1" style="position:absolute;left:88px;top:506px;width:139px;height:20px;text-align:center;z-index:4;">
<span>[<a href="http://www.itguru4you.com">ITGURU4YOU.COM</a>]</span></div>
<div id="wb_Text2" style="position:absolute;left:0px;top:489px;width:318px;height:15px;text-align:center;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:12px;"><strong>Website Developed &amp; Maintained by&nbsp; </strong></span></div>
<div id="wb_JavaScript2" style="position:absolute;left:49px;top:530px;width:209px;height:17px;z-index:6;">
<div style="color:#000000;font-size:11px;font-family:Arial;font-weight:normal;font-style:normal;text-align:left;text-decoration:none" id="copyrightnotice"></div>
<script type="text/javascript">
   var now = new Date();
   var startYear = "2000";
   var text =  "Copyright &copy; ";
   if (startYear != '')
   {
      text = text + startYear + "-";
   }
   text = text + now.getFullYear() + ", All rights reserved";
   var copyrightnotice = document.getElementById('copyrightnotice');
   copyrightnotice.innerHTML = text;
</script>


</div>
<div id="wb_logoutform" style="position:absolute;left:197px;top:6px;width:108px;height:36px;z-index:7;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" id="logout" name="logout" value="Logout" style="position:absolute;left:6px;top:5px;width:96px;height:25px;z-index:0;">
</form>
</div>

</div>
</body>
</html>