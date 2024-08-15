<?php
router()->post('/api/register', $auth_controller->register_api);
router()->post('/api/login', $auth_controller->login_api);
?>