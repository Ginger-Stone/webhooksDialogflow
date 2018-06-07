<?php

$method = $_server['REQUEST_METHOD'];

//Process only when method is POST
if($method == "POST"){
  $requestBody = file_get_contents('php://input');
  $json = json_decode($requestBody);

  $text = $json->result->parameters->text

  switch ($text) {
    case 'cheated' || 'cheat' || 'parted ways' || 'broke up':
      $speech = "I am so sorry. Would you like us to talk about it?";
      if ($text == 'yes' || 'sure' || 'I would like to talk') {
        $speech = "Tell me what happened. I'm all ears dear.";
      }
      else {
        $speech = "Its okay. What would you like to talk about?";
      }
      break;

    default:
      $speech = "Sorry, I can't help you on that yet. I am only trained to talk to you about a few things now."
      break;
  }
  $response = new \stdClass();
  $response -> speech = "";
  $response -> displayText = "";
  $response -> source = "webhook";
  echo json_encode($response);
}
else {
  {
    echo "method not allowed.";
  }
}
 ?>
