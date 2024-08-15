<?php
require(__DIR__."/core/config.php");
  http_response_code(404);
  exit("404 page not found <a href='".SSL."'>Home Page</a>");
?>