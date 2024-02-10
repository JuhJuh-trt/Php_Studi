<?php 
  include "/html/page.html"; // L'inclusion d'un chemin de fichier erroné génère un warning non bloquant
  require "/html/page.html"; // L'inclusion d'un chemin de fichier erroné génère une erreur bloquante

  // la logique est que pour intégrer du contenu on utilise include et require pour le contenu HTML et include_once et require_once pour du script PHP