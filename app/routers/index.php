<?php
// ROUTE PAR DEFAUT
// PATTERN: /
// CTRL: booksController
// ACTION: indexAction
if (isset($_GET['books'])):
    include '../app/routers/books.php';


elseif (isset($_GET['authors'])):
    include '../app/routers/authors.php';
else:
// ROUTE PAR DEFAUT
// PATTERN: /
// CTRL: pagesController
// ACTION: homeAction
\App\Controllers\PagesController::homeAction();

endif;