<?php

$router->get('blog','controllers/index.php');
$router->get('blog/category','controllers/category.php');

$router->get('blog/admin','controllers/admin/login.php');
$router->get('blog/admin/blogs','controllers/admin/blogs.php');
$router->get('blog/admin/categories','controllers/admin/categories.php');
$router->get('blog/admin/add-blog','controllers/admin/add-blog.php');
$router->get('blog/admin/add-category','controllers/admin/add-category.php');
$router->get('blog/admin/category','controllers/admin/category.php');
$router->post('blog/admin/adminController','controllers/admin/adminController.php');
$router->post('blog/admin/update-blog','controllers/admin/update-blog.php');
$router->post('blog/admin/update-category','controllers/admin/update-category.php');

