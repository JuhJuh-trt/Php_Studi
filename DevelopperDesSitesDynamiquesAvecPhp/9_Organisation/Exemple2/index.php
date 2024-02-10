<?php
  require 'back/language.php';
  require 'back/articles.php';
  $language = 'fr';
  $articles = loadArticles();
  loadLanguage($language);
?>
<html>
  <head>
    <title>Ma boutique en ligne</title>
  </head>
  <body>
    <?php 
      require 'front/header.php';
    ?>
    <div>
      <h2><?php echo TEXT_ARTICLES; ?></h2>
      <?php
      foreach ($articles as $article) {
        $title = $article['name'];
        $price = $article['price'];
        $description = $article['description'];
        require 'front/article.php';
      }
      ?>
    </div>
  </body>
</html>