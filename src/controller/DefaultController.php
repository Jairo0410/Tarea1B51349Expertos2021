<?php

require_once routeLibs.'View.php';

class DefaultController {
  function notFound($message) {
      view('notFound.php', $message);
  }
}

?>
