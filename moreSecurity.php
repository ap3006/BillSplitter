<?php
  function security($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
  }
 ?>
