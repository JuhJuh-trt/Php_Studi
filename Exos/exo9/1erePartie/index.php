<?php
  require_once 'back/user.php';
  require_once 'language.php';

  $user = getUser();
  loadLanguage($user['language']);
  $name = $user['name'];
  $sports = getUserSports($user);

  include 'front/template.php'; 
?>
