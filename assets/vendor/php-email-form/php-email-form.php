<?php
class PHP_Email_Form {
  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $smtp;
  public $ajax = true;
  private $messages = [];

  public function add_message($content, $name, $priority = 1) {
    $this->messages[] = ["content" => $content, "name" => $name, "priority" => $priority];
  }

  public function send() {
    $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
    $headers .= "Reply-To: " . $this->from_email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    $message = "";
    foreach($this->messages as $msg) {
      $message .= $msg['name'] . ": " . $msg['content'] . "\n";
    }

    if(mail($this->to, $this->subject, $message, $headers)) {
      return 'OK';
    } else {
      return 'Error: Unable to send email.';
    }
  }
}
?>
