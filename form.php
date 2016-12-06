<?

<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
$CONST_MAIL_NAME = "TFB: Написать нам";
$CONST_MAIL = "a.voskoboenko@mail.ru";
//$CONST_MAIL = "zloi.gremlin@gmail.com";



function send_mail($to_name, $to_email, $subject, $message, $from_name, $from_email, $bcc="")
{
    if(!$to_name)
    {
        $temp=explode("@",$to_email);
        $to_name=$temp[0];
    }
    if(!$from_name)
    {
        $temp=explode("@",$from_email);
        $from_name=$temp[0];
    }
    
 
    

    //$message=stripslashes(convert_cyr_string($message,"w","k"));
    $message=stripslashes($message);

    if($from_email || $from_name) $from="From: ".$from_name." <".$from_email.">\n";
    if($bcc)$bcc="Bcc: ".$bcc."\n";
    if($to_email) $to=$to_email;
    //if(@mail($to,$subject,$message,"Content-Type: text/html; charset=utf-8\n".$from.$bcc."Content-Type: text/html; charset=utf-8")==false ) return false;


//$headers="Content-Type: text/html; charset=utf-8\n";
//$headers = "Content-Type: text/html; charset=utf-8\n".$from.$bcc."Content-Type: text/html; charset=utf-8";	


    $from = 'robot@business-templates.ru';

	
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: ' . $from . "\r\n" .
				'Reply-To: robot@business-templates.ru' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();


    if(mail($to,$subject,$message,$headers)==false ) return false;

    else return true;
}


$message = '';


$message .= '<html><head><title>Заявка с сайта</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>';


$message .='<style type="text/css">
BODY {COLOR: #666666; FONT-FAMILY: Tahoma, Helvetica, Arial; FONT-SIZE: 80%;}
TABLE, TD, FONT, DIV {COLOR: #666666; FONT-FAMILY: Tahoma, Helvetica, sans serif, Arial; FONT-SIZE: 100%;}
H1 {FONT-SIZE: 24px; FONT-FAMILY: Arial, Helvetica, sans-serif; color: #333333; MARGIN-BOTTOM: 7px; MARGIN-TOP: 4px;}
H2 {FONT-SIZE: 18px; FONT-FAMILY: Arial, Helvetica, sans-serif; color: #cc0000; MARGIN-BOTTOM: 3px; MARGIN-TOP: 2px; FONT-WEIGHT: Normal;}
.small {COLOR: #666666; FONT-FAMILY: Tahoma, Helvetica, Arial; FONT-SIZE: 90%;}
.red {COLOR: #cc0000; FONT-FAMILY: Tahoma, Helvetica, Arial; FONT-SIZE: 100%;}
</style>';


$message .= '</head>
<body>';


$message .= '<h1>Заявка с сайта на покупку шаблона</h1>
<hr width="100%">
<br>
<table border="0" cellspacing="0" cellpadding="0">
<tr>';


$zajavka_date = date("d.m.Y");

$message .= '
	<td align="right">от '.$zajavka_date.' г.</td>
</tr>
</table>
<br>
<table border="0" cellpadding="0" cellspacing="5" width="100%">

<tr>
<td nowrap><strong>Имя</strong></td>
<td width="100%"><div class="red">'.$_POST['name'].'</div></td>
</tr>


    <tr>
        <td nowrap><strong>E-mail</strong></td>
        <td width="100%"><div class="red">'.$_POST['email'].'</div></td>
    </tr>


    <tr>
        <td nowrap><strong>Телефон</strong></td>
        <td width="100%"><div class="red">'.$_POST['message'].'</div></td>
    </tr>





</table></body></html>';

$name_to = $CONST_MAIL_NAME;
$email_to = $CONST_MAIL;
$theme = "TFB: Написать нам";
$name_from = $_POST['name'].' '.$_POST['last_name'];
$email_from = "robot@business-templates.ru";
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        if ($_POST['name'] && $_POST['email']) {
$mail_result=send_mail($name_to, $email_to, $theme, $message, $name_from, $email_from);
}
header('Content-type: application/json');
$res = array('status'=>$mail_result);



echo json_encode($res);

}
?>
