<?php

  require_once 'template.php';
  require_once 'back/recipesLoader.php';
  foreach (getRecipes() as $recipe) {
    $platTitle = $recipe['title'];
    $temps = $recipe['time'];
    $difficulty = $recipe['difficulty'];
    include 'front/recipe.php';
  }
?>