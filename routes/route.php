<?php
router()->get('/', $page_controller->home);
router()->get('/login', $page_controller->login_page);
router()->get('/profile', $page_controller->profile);
router()->get('/logout', $page_controller->logout);

?>