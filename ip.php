<!DOCTYPE html>
<html>
<head>
<title> Page Title </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="folder/favicon.ico" rel="icon" sizes="16x16" type="image/png" />

</head>
<body>
    <h1>Welcome</h1>
    <h3> This is a demo website for testing purposes</h3>
    <h2><b>Note:**</b> you can leave once you join the site</h2>
<h1>
<?PHP

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

/*echo $user_ip;*/

$file = 'last-ip.txt'; 

$fp = fopen($file, 'a');

fwrite($fp, $user_ip);

fclose($fp);

$line = date('Y-m-d H:i:s') . " - $_SERVER[REMOTE_ADDR]";
file_put_contents('visitors.log', $line . PHP_EOL, FILE_APPEND);

?>
</h1>
</b>
</center>


</body>
<div id="log"></div>
</html>