<?php
function loadLanguage(string $language) {
  if ($language === 'fr') {
    require_once ('languages/language_fr.php');
  } else {
    require_once ('languages/language_en.php');
  }
}
