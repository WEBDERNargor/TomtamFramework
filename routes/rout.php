<?php


















$tom->router->get('/', function() use($view,$tom,$db) {
    $tom->send_to($view->render('user.about', ['title' => WEB]));
});





?>