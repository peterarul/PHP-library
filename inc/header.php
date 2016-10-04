<html>

<head>
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css"> </head>

<body>
    <nav class="navbar  navbar-inverse  navbar-fixed-top">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation</span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button> <a class="navbar-brand" href="#"> PHP Library</a>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="books<?php if ($section == " null ") { echo " on "; } ?>"><a href="index.php">Home</a></li>
                    <li class="books<?php if ($section == " books ") { echo " on "; } ?>"><a href="catalog.php?cat=books">Books</a></li>
                    <li class="movies<?php if ($section == " movies ") { echo " on "; } ?>"><a href="catalog.php?cat=movies">Movies</a></li>
                    <li class="music<?php if ($section == " music ") { echo " on "; } ?>"><a href="catalog.php?cat=music">Music</a></li>
                    <!--<li class="suggest<?php if ($section == "suggest") { echo " on"; } ?>"><a href="suggest.php">Suggest</a></li>
                    <li> <a href="#">About</a> </li> -->
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login</a> <b class="caret"> </b>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"></li>
                            <li><a href="#">Logout </a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="body_pad"></div>
    <div id="container">