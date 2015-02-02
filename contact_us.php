<?php
if (session_id() == "")
{
   session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form1')
{
   if (isset($_POST['captcha_code'],$_SESSION['random_txt']) && md5($_POST['captcha_code']) == $_SESSION['random_txt'])
   {
      unset($_POST['captcha_code'],$_SESSION['random_txt']);
   }
   else
   {
      $errorcode = file_get_contents('./contact_us.php');
      $replace = "##error##";
      $errorcode = str_replace($replace, 'The entered code was wrong.', $errorcode);
      echo $errorcode;
      exit;
   }
}
?>
<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form1')
{
   $mailto = 'ashir_yousaf@hotmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Inquiry';
   $message = 'We will contact you ASAP.

Regards,
Floral Express Delivery, Inc.';
   $success_url = './index.php';
   $error_url = './contact_us.php';
   $error = '';
   $autoresponder_from = 'ashir_yousaf@hotmail.com';
   $autoresponder_subject = 'Floral Express Inquiry Request';
   $autoresponder_message = 'We will contact you ASAP.

Regards,
Floral Express Delivery, Inc.';
   $eol = "\n";
   $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   $autoresponder_header  = 'From: '.$autoresponder_from.$eol;
   $autoresponder_header .= 'Reply-To: '.$autoresponder_from.$eol;
   $autoresponder_header .= 'MIME-Version: 1.0'.$eol;
   $autoresponder_header .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $autoresponder_header .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $autoresponder_header .= 'X-Mailer: PHP v'.phpversion().$eol;
   mail($mailfrom, $autoresponder_subject, $autoresponder_message, $autoresponder_header);
   header('Location: '.$success_url);
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
<link href="wb.validation.css" rel="stylesheet">
<link href="Index_mobile.css" rel="stylesheet">
<link href="contact_us.css" rel="stylesheet">
<script src="jquery-1.11.1.min.js"></script>
<script src="wb.validation.min.js"></script>
<script src="jquery.mobile-1.4.0.min.js"></script>
<script src="wwb10.min.js"></script>
<script>
$(document).on("pagecreate", "#contact_us", function(event)
{
   $("#Form1").submit(function(event)
   {
      var isValid = $.validate.form(this);
      return isValid;
   });
   LoadValue('Editbox1', 'local', 0);
   LoadValue('Editbox2', 'local', 0);
   LoadValue('TextArea1', 'local', 0);
   LoadValue('Captcha1', 'local', 0);
   $("#Form1").submit(function(event)
   {
      StoreValue('Editbox1', 'local', 0);
      StoreValue('Editbox2', 'local', 0);
      StoreValue('TextArea1', 'local', 0);
      StoreValue('Captcha1', 'local', 0);
      return true;
   });
   $("#Editbox1").validate(
   {
      required: true,
      type: 'custom',
      param: /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/,
      color_text: '#000000',
      color_hint: '#00FF00',
      color_error: '#FF0000',
      color_border: '#808080',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'topleft',
      offsetx: 0,
      offsety: 0,
      effect: 'none',
      error_text: ''
   });
   $("#Editbox2").validate(
   {
      required: true,
      type: 'email',
      color_text: '#000000',
      color_hint: '#00FF00',
      color_error: '#FF0000',
      color_border: '#808080',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'topleft',
      offsetx: 0,
      offsety: 0,
      effect: 'none',
      error_text: ''
   });
});
</script>
</head>
<body>
<div data-role="page" data-theme="a" data-title="Index" id="contact_us">
<div data-role="header" id="Header2">
<h1>FLORAL EXPRESS</h1>
<a href="./index.php" data-role="button" data-icon="home" class="ui-btn-left">Home</a>
</div>
<div class="ui-content" role="main">
<div id="wb_Form1" style="">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" data-ajax="true" data-transition="pop" id="Form1" style="display:inline;">
<input type="hidden" name="formid" value="form1">
<input type="hidden" name="Submit" value="Submit">
<label for="Editbox1"></label>
<input type="text" data-theme="e" id="Editbox1" style="" name="Name" value="" placeholder="Name">
<label for="Editbox2"></label>
<input type="email" data-theme="e" id="Editbox2" style="" name="Email" value="" placeholder="Email">
<label for="TextArea1"></label>
<textarea name="Message data-theme="e"" id="TextArea1" style="" rows="1" cols="41" placeholder="Message"></textarea>
<img src="captcha1.php" alt="Click for new image" title="Click for new image" style="cursor:pointer;width:100px;height:38px;" onclick="this.src='captcha1.php?'+Math.random()">
<label for="Captcha1"></label>
<input type="text" data-theme="e" id="Captcha1" style="" name="captcha_code" value="">
<input type="submit" data-icon="action" data-iconpos="left" data-theme="e" id="Button1" name="" value="Submit">
</form>
</div>
</div>
<div data-role="footer" id="Footer1" data-position="fixed"><h4>Footer</h4></div>
</div>
</body>
</html>