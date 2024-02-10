<?php
  $language = 'fr';
?>
<html>
  <head>
    <title>Ma boutique en ligne</title>
  </head>
  <body>
    <header>
      <h1>
        <?php
        if ($language === 'fr') {
          echo 'Bienvenue sur notre boutique en ligne !';
        }
        else {
          echo 'Welcome !';
        }
        ?>
      </h1>
    </header>
    <div>
      <h2>
        <?php
        if ($language === 'fr') {
          echo 'Nos articles';
        }
        else {
          echo 'Our products';
        }
        ?> :
      </h2>
      <?php
      function loadArticles():array {
        return [
          [
          'name' => 'Carte mère',
          'price' => 120,
          'description' => 'Une super carte mère !',
          ],
          [
          'name' => 'Carte graphique',
          'price' => 500,
          'description' => 'Une super carte graphique !',
          ],
          [
          'name' => 'Barettes de RAM',
          'price' => 150,
          'description' => '8 Go de RAM, même pour les jeux !',
          ],
        ];
      }
      foreach (loadArticles () as $article) {
        echo '<div>
        <h3>' . $article['name'] . ' - ' . $article['price'] . '€ </h3>
        <p>' . $article['description'] . '</p>
            </div>';
      } ?>
    </div>
  </body>
</html>