<?php
if (session_id() == "")
{
   session_start();
}
$password = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'loginform')
{
   $password = isset($_POST['password']) ? $_POST['password'] : '';
   if ($password == 'Morgan@10')
   {
      $_SESSION['password'] = $password;
   }
}
else
{
   $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
}
if ($password != 'Morgan@10')
{
   echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
   echo "<html>\n";
   echo "<head>\n";
   echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
   echo "<title>Admin_page</title>\n";
   echo "</head>\n";
   echo "<body>\n";
   echo "<center>\n";
   echo "<br>\n";
   if($_SERVER['REQUEST_METHOD'] == 'POST')
      echo "<span style=\"font-size:13px;font-family:Arial;font-weight:normal;text-decoration:none;color:#FF0000\">The specified password is invalid!<br><br><br></span>\n";
   else
      echo "<span style=\"font-size:13px;font-family:Arial;font-weight:normal;text-decoration:none;color:#000000\">This page is password protected.<br><br><br></span>\n";
   echo "<form method=\"post\" action=\"".basename(__FILE__)."\">\n";
   echo "<input type=\"hidden\" name=\"form_name\" value=\"loginform\">\n";
   echo "   <table cellspacing=\"0\" cellpadding=\"3\" border=\"0\" bgcolor=\"#FFFFFF\" style=\"border:1px solid #000000;\">\n";
   echo "      <tr>\n";
   echo "         <td colspan=\"2\" bgcolor=\"#000000\" style=\"text-align:center;padding:4px;font-size:13px;font-family:Arial;font-weight:normal;text-decoration:none;color:#FFFFFF\"><b>Login</b></td>\n";
   echo "      </tr>\n";
   echo "      <tr>\n";
   echo "         <td style=\"font-size:13px;font-family:Arial;font-weight:normal;text-decoration:none;color:#000000;text-align:right;\" width=\"30%\" height=\"60\">Password:</td>\n";
   echo "         <td style=\"font-size:13px;font-family:Arial;font-weight:normal;text-decoration:none;color:#000000;text-align:left\" width=\"70%\" height=\"60\"><input type=\"password\" name=\"password\" value=\"\" style=\"border:1px solid #000000;width:120px;\">&nbsp;&nbsp;<input type=\"submit\" value=\"Login\"></td>\n";
   echo "      </tr>\n";
   echo "   </table>\n";
   echo "</form>\n";
   echo "</center>\n";
   echo "</body>\n";
   echo "</html>\n";
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: #');
   exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin_page</title>
<meta name="keywords" content="delivery flowers, flowers">
<meta name="generator" content="www.ITGURU4YOU.COM - for all your internet solutions">
<style type="text/css">
html, body
{
   height: 100%;
}
div#space
{
   width: 1px;
   height: 50%;
   margin-bottom: -1250px;
   float:left
}
div#container
{
   width: 1226px;
   height: 2500px;
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
#wb_CssMenu2
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu2 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu2 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu2 a
{
   display: block;
   float: left;
   color: #666666;
   border: 1px #000000 solid;
   background-color: #00FA9A;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu2 li:hover a, #wb_CssMenu2 a:hover
{
   color: #666666;
   background-color: #FAFAD2;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu2 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu2 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu2 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#InlineFrame1
{
   border: 0px #A52A2A solid;
}
#wb_CssMenu4
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu4 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu4 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu4 a
{
   display: block;
   float: left;
   color: #000000;
   border: 1px #000000 solid;
   background-color: #FFFF00;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu4 li:hover a, #wb_CssMenu4 a:hover
{
   color: #000000;
   background-color: #1E90FF;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu4 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu4 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu4 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#Line1
{
   color: #000000;
   background-color: #000000;
   border-width: 0;
   margin: 0;
   padding: 0;
}
#wb_CssMenu5
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu5 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu5 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu5 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 1px #000000 solid;
   background-color: #0000FF;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu5 li:hover a, #wb_CssMenu5 a:hover
{
   color: #000000;
   background-color: #9ACD32;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu5 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu5 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu5 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#wb_CssMenu6
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu6 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu6 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu6 a
{
   display: block;
   float: left;
   color: #000000;
   border: 1px #000000 solid;
   background-color: #FFFF00;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu6 li:hover a, #wb_CssMenu6 a:hover
{
   color: #000000;
   background-color: #1E90FF;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu6 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu6 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu6 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#wb_CssMenu9
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu9 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu9 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu9 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 1px #000000 solid;
   background-color: #DC143C;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu9 li:hover a, #wb_CssMenu9 a:hover
{
   color: #000000;
   background-color: #87CEEB;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu9 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu9 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu9 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#Logout1
{
   background-color: #EEEEEE;
   border-color: #878787;
   border-width: 1px;
   border-style: solid;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   width: 96px;
   height: 25px;
}
#wb_CssMenu1
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu1 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu1 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu1 a
{
   display: block;
   float: left;
   color: #666666;
   border: 1px #000000 solid;
   background-color: #00FA9A;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu1 li:hover a, #wb_CssMenu1 a:hover
{
   color: #666666;
   background-color: #FAFAD2;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu1 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu1 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu1 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#wb_CssMenu3
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu3 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu3 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu3 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 1px #000000 solid;
   background-color: #DC143C;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu3 li:hover a, #wb_CssMenu3 a:hover
{
   color: #000000;
   background-color: #87CEEB;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu3 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu3 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu3 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
#wb_CssMenu7
{
   border: 0px #B8860B solid;
   background-color: transparent;
}
#wb_CssMenu7 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
}
#wb_CssMenu7 li
{
   float: left;
   margin: 0;
   padding: 0px 4px 0px 0px;
   width: 175px;
}
#wb_CssMenu7 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 1px #000000 solid;
   background-color: #0000FF;
   background-image: none;
   font-family: "Times New Roman";
   font-size: 16px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   width: 163px;
   height: 26px;
   padding: 0px 5px 0px 5px;
   vertical-align: middle;
   line-height: 26px;
   text-align: center;
}
#wb_CssMenu7 li:hover a, #wb_CssMenu7 a:hover
{
   color: #000000;
   background-color: #9ACD32;
   background-image: none;
   border: 1px #C0C0C0 solid;
}
#wb_CssMenu7 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu7 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu7 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0;
}
</style>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_CssMenu2" style="position:absolute;left:106px;top:67px;width:182px;height:33px;z-index:0;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/driver_reg/driver_reg.php" target="admin_page">Drivers&nbsp;Registration</a>
</li>
</ul>
<br>
</div>
<iframe name="admin_page" id="InlineFrame1" style="position:absolute;left:17px;top:160px;width:1126px;height:2245px;z-index:1;" src="" scrolling="no" frameborder="0"></iframe>
<div id="wb_CssMenu4" style="position:absolute;left:661px;top:68px;width:179px;height:33px;z-index:2;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/search_driver_payroll/search.php" target="admin_page">Payroll&nbsp;Indvidual&nbsp;Drivers</a>
</li>
</ul>
<br>
</div>
<hr id="Line1" style="position:absolute;left:100px;top:147px;width:899px;height:3px;z-index:3;">
<div id="wb_CssMenu5" style="position:absolute;left:476px;top:107px;width:180px;height:33px;z-index:4;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/search_total_delivery/search.php" target="admin_page">Total&nbsp;Deliveries</a>
</li>
</ul>
<br>
</div>
<div id="wb_CssMenu6" style="position:absolute;left:662px;top:107px;width:179px;height:33px;z-index:5;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/search_total_payroll/search.php" target="admin_page">Total&nbsp;Payroll&nbsp;Summary</a>
</li>
</ul>
<br>
</div>
<div id="wb_CssMenu9" style="position:absolute;left:290px;top:67px;width:179px;height:33px;z-index:6;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/shop_reg/shop_reg.php" target="admin_page">Shop&nbsp;Registration</a>
</li>
</ul>
<br>
</div>

<div id="wb_Logout1" style="position:absolute;left:901px;top:119px;width:96px;height:25px;z-index:8;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_CssMenu1" style="position:absolute;left:105px;top:107px;width:182px;height:33px;z-index:9;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/driver_edit/view.php" target="admin_page">Edit&nbsp;/&nbsp;Delete&nbsp;Driver</a>
</li>
</ul>
<br>
</div>
<div id="wb_CssMenu3" style="position:absolute;left:291px;top:108px;width:182px;height:33px;z-index:10;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/shop_edit/view.php" target="admin_page">Edit&nbsp;/&nbsp;Delete&nbsp;Shop</a>
</li>
</ul>
<br>
</div>
<div id="wb_CssMenu7" style="position:absolute;left:475px;top:68px;width:180px;height:33px;z-index:11;">
<ul>
<li class="firstmain"><a href="http://www.floralexpressdelivery.com/newweb/forms/admin_forms/search_zipcode/search.php" target="admin_page">Zipcodes</a>
</li>
</ul>
<br>
</div>
</div>
</body>
</html>