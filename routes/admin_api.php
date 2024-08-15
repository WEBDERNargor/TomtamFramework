<?php
router()->post('/admin/api/user_single', $user_manager_controller->single);
router()->post('/admin/api/user_edit', $user_manager_controller->user_edit);