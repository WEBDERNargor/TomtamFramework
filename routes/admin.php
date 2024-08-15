<?php
router()->get('/admin', $admin_page_controller->home);
router()->get('/admin/users', $admin_page_controller->users);

