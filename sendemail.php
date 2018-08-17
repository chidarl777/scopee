<?php
use google\appengine\api\mail\Message;

// Notice that $image_content_id is the optional Content-ID header value of the
// attachment. Must be enclosed by angle brackets (<>)
$image_content_id = '<image-content-id>';

// Pull in the raw file data of the image file to attach it to the message.
$image_data = file_get_contents('images/ej.jpg');

try {
    $message = new Message();
    $message->setSender('scopee777@gmail.com');  //my business email address
    $message->addTo('nwaokorobiadarlington@gmail.com'); // my personal email address for testing
    $message->setSubject('Example email');
    $message->setTextBody('Hello, world!');
    $message->addAttachment('images/ej.jpg', $image_data, $image_content_id);
    $message->send();
    echo 'Mail Sent';
} catch (InvalidArgumentException $e) {
    echo 'There was an error';
}
?>