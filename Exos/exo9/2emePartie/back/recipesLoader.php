<?php

function loadRecipes(): array
{
  return json_decode(base64_decode('WyJHYXRlYXUgYXUgY2hvY29sYXQiLDQwLDEsIkZsYW4gcGF0aXNzaWVyIiw2MCwyXQ'), true);
}

function getRecipes(): array {
  $recipes = loadRecipes();
  $recipesCount = count($recipes);
  $formattedRecipes = [];
  
  for ($i = 0; $i < $recipesCount; $i+=3) {
    $formattedRecipes[] = [
      'title' => $recipes[$i],
      'time' => $recipes[$i+1],
      'difficulty' => $recipes[$i+2],
    ];
    
  }
  return $formattedRecipes;
}

