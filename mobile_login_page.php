<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'loginform')
{
   $success_page = './mobile_mainpage_drivers.php';
   $error_page = basename(__FILE__);
   $mysql_server = '10.6.175.47';
   $mysql_username = 'floralexpress';
   $mysql_password = 'Morgan@10';
   $mysql_database = 'floralexpress';
   $mysql_table = 'driver_reg';
   $crypt_pass = ($_POST['password']);
   $found = false;
   $fullname = '';
   $session_timeout = 60000;
   $db = mysql_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysql_error());
   }
   mysql_select_db($mysql_database, $db) or die('Failed to select database<br>'.mysql_error());
   $sql = "SELECT password, driver_name FROM ".$mysql_table." WHERE username = '".mysql_real_escape_string($_POST['username'])."'";
   $result = mysql_query($sql, $db);
   if ($data = mysql_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] )
      {
         $found = true;
         $fullname = $data['driver_name'];
      }
   }
   mysql_close($db);
   if($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      if (session_id() == "")
      {
         session_start();
      }
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $fullname;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $_POST['username'], time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);
      }
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
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
   margin-bottom: -516px;
   float:left
}
div#container
{
   width: 320px;
   height: 1032px;
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
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: center;
}
#wb_Text1 div
{
   text-align: center;
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
#Image2
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#wb_loginform
{
   background-color: transparent;
   border: 1px #878787 solid;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   -moz-box-shadow: 0px 0px 5px #CD5C5C;
   -webkit-box-shadow: 0px 0px 5px #CD5C5C;
   box-shadow: 0px 0px 5px #CD5C5C;
}
#wb_Text8 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: left;
}
#wb_Text8 div
{
   text-align: left;
}
#wb_Text9 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: right;
}
#wb_Text9 div
{
   text-align: right;
}
#wb_Text10 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   margin: 0;
   text-align: right;
}
#wb_Text10 div
{
   text-align: right;
}
#username
{
   border: 1px #878787 solid;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   background-color: #FFFFFF;
   color :#A9A9A9;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
   -moz-box-shadow: 0px 0px 5px #0000CD;
   -webkit-box-shadow: 0px 0px 5px #0000CD;
   box-shadow: 0px 0px 5px #0000CD;
}
#username:hover
{
   border-color: #FF0000;
   -webkit-transition: border-color 500ms linear 0ms;
   -moz-transition: border-color 500ms linear 0ms;
   -ms-transition: border-color 500ms linear 0ms;
   transition: border-color 500ms linear 0ms;
}
#password
{
   border: 1px #878787 solid;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   background-color: #FFFFFF;
   color :#A9A9A9;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
   -moz-box-shadow: 0px 0px 5px #0000CD;
   -webkit-box-shadow: 0px 0px 5px #0000CD;
   box-shadow: 0px 0px 5px #0000CD;
}
#password:hover
{
   border-color: #FF0000;
   -webkit-transition: border-color 500ms linear 0ms;
   -moz-transition: border-color 500ms linear 0ms;
   -ms-transition: border-color 500ms linear 0ms;
   transition: border-color 500ms linear 0ms;
}
#login
{
   border: 1px #878787 solid;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   -moz-box-shadow: 0px 0px 5px #0000CD;
   -webkit-box-shadow: 0px 0px 5px #0000CD;
   box-shadow: 0px 0px 5px #0000CD;
}
#login:hover
{
   background-color: #FFD700;
   -webkit-transition: background-color 500ms linear 0ms;
   -moz-transition: background-color 500ms linear 0ms;
   -ms-transition: background-color 500ms linear 0ms;
   transition: background-color 500ms linear 0ms;
}
#Image13
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Image14
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
}
#Image3
{
   border: 0px #000000 solid;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
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
<div id="wb_Text1" style="position:absolute;left:64px;top:95px;width:175px;height:27px;text-align:center;z-index:9;">
<span style="color:#000000;font-family:'Hobo Std';font-size:19px;">Driver's Log In</span></div>
<div id="wb_TextMenu1" style="position:absolute;left:88px;top:506px;width:139px;height:20px;text-align:center;z-index:10;">
<span>[<a href="http://www.itguru4you.com">ITGURU4YOU.COM</a>]</span></div>
<div id="wb_Text2" style="position:absolute;left:0px;top:489px;width:318px;height:15px;text-align:center;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:12px;"><strong>Website Developed &amp; Maintained by&nbsp; </strong></span></div>
<div id="wb_JavaScript2" style="position:absolute;left:49px;top:530px;width:209px;height:17px;z-index:12;">
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
<div id="wb_Image2" style="position:absolute;left:123px;top:24px;width:69px;height:56px;z-index:13;">
<img src="images/icon_job_lg.png" id="Image2" alt=""></div>
<div id="wb_loginform" style="position:absolute;left:14px;top:135px;width:283px;height:212px;z-index:14;">
<form name="loginform" method="post" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<div id="wb_Text8" style="position:absolute;left:49px;top:150px;width:95px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Remember me</span></div>
<input type="checkbox" id="rememberme" name="rememberme" value="on" style="position:absolute;left:24px;top:149px;z-index:1;">
<div id="wb_Text9" style="position:absolute;left:37px;top:16px;width:75px;height:16px;text-align:right;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>User Name</strong></span></div>
<div id="wb_Text10" style="position:absolute;left:37px;top:82px;width:71px;height:16px;text-align:right;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Password</strong></span></div>
<input type="text" id="username" style="position:absolute;left:43px;top:41px;width:229px;height:26px;line-height:26px;z-index:4;" name="username" value="<?php echo $username; ?>">
<input type="password" id="password" style="position:absolute;left:44px;top:104px;width:228px;height:25px;line-height:25px;z-index:5;" name="password" value="<?php echo $password; ?>">
<input type="submit" id="login" name="login" value="Log In" style="position:absolute;left:71px;top:177px;width:131px;height:27px;z-index:6;">
<div id="wb_Image13" style="position:absolute;left:5px;top:40px;width:35px;height:28px;z-index:7;">
<img src="images/Admin1.png" id="Image13" alt=""></div>
<div id="wb_Image14" style="position:absolute;left:6px;top:105px;width:34px;height:26px;z-index:8;">
<img src="images/leading-edge-security.png" id="Image14" alt=""></div>
</form>
</div>

<div id="wb_Image3" style="position:absolute;left:14px;top:4px;width:44px;height:44px;z-index:16;">
<a href="./mobile_index.php"><img src="images/arrow-left.png" id="Image3" alt=""></a></div>
<div id="wb_Image1" style="position:absolute;left:255px;top:4px;width:44px;height:44px;z-index:17;">
<img src="images/arrow-right.png" id="Image1" alt=""></div>
</div>
</body>
</html>