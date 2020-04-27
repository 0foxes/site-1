<?PHP
$sender = 'message@.com';
$recipient = '@gmail.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message delivered";
}
else
{
    echo "Error: Message not delivered";
}
?>
