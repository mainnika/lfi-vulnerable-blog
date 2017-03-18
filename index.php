<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Template for Bootstrap</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/blog.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="blog-masthead">
    <div class="container">
      <nav class="blog-nav">
        <a class="blog-nav-item active" href="/">Home</a>

        <?php

          $page = filter_input(INPUT_GET, 'page');

          if (isset($page)) {
            $a = sprintf('<a class="blog-nav-item" href="/?page=%s">%s</a>', $page, $page);
            echo $a;
          }

        ?>

      </nav>
    </div>
  </div>
  <div class="container">
    <div class="blog-header">
      <h1 class="blog-title">The Bootstrap Blog</h1>
      <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>
    <div class="row">
      <div class="col-sm-8 blog-main">

      <?php

        $page = filter_input(INPUT_GET, 'page');

        if (isset($page)) {

          $file = sprintf('./pages/%s', $page);

          if (!file_exists($file)) {
            http_response_code(404);
            echo <<<EOT
            <div class="blog-post">
            <h2 class="blog-post-title">Page doesn't exists</h2>
            </div>
EOT;
          } else {
            include $file;
          }

        } else {

          $pages = scandir('./pages');

          echo '<ul class="list-group">';

          foreach($pages as $page) {

            if ($page == '..' || $page == '.') {
              continue;
            }

            $matches = NULL;
            $count = preg_match('/^(.*)\.php$/', $page, $matches);
            if (!$count) {
              continue;
            }

            $a = sprintf('<li class="list-group-item"><a href="?page=%s">%s</a></li>', $page, $matches[1]);
            echo $a;
          }

          echo '</ul>';

        }
      ?>
      </div>
      <!-- /.blog-main -->
      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          <h4>About</h4>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean
            lacinia bibendum nulla sed consectetur.</p>
        </div>
      </div>
      <!-- /.blog-sidebar -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <footer class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>