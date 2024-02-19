<?php require 'core/validation.php'; ?>
<?php session_start(); ?>
<?php

if (isset($_POST['update'])) {
    header('location: /blog/admin/update-blog');
}

if (isset($_POST['delete'])) {
    $database->delete('blogs', 'id', array_key_first($_REQUEST));
    header('location: /blog/admin/blogs');
}

if (isset($_POST['add-blog'])) {
    $category = $database->selectALL('category');
    $validation->title = trim($_POST['title']);
    $validation->author = trim($_POST['author']);
    $validation->content = trim($_POST['content']);
    $validation->category = trim($_POST['category']);
    $validation->post = $_FILES['post'];

    foreach ($category as $key => $value) {
        if ($value['category'] == $validation->category) {
            $id = $value['id'];
        }
    }

    $data = $database->selectALL('blogs');
    $titles = array_column($data, 'title');
    $TitleError = $validation->isTitleValid($validation->title, $titles);
    $authorError = $validation->isAuthorValid($validation->author);
    $categoryError = $validation->notEmpty($validation->category, "Please select a category");
    $contentError = $validation->isContentValid($validation->content);
    $postError =$validation->isPostImageValid();

    if (!strlen($TitleError) && !strlen($contentError) && !strlen($authorError) && !strlen($categoryError) && !strlen($postError)) {

        if (move_uploaded_file($_FILES['post']["tmp_name"], $validation->path)) {
            $database->insert('blogs', [
                'title' => $_REQUEST['title'],
                'content' => $_REQUEST['content'],
                'author' => $_REQUEST['author'],
                'category' => $id,
                'post' => $_FILES['post']['name'],
            ]);
            header('location: /blog/admin/blogs');
            exit();
        } else {
            $postError = "file location error";
        }       
        

    } else {
        header("location: /blog/admin/add-blog?" . http_build_query(['TitleError' => $TitleError, 'ContentError' => $contentError, 'AuthorError' => $authorError, 'CategoryError' => $categoryError, 'postError' => $postError, 'categoryId' => $categoryId, 'title' => $validation->title, 'author' => $validation->author, 'content' => $validation->content, 'category' => $validation->category, 'post' => $validation->post, ]));
        exit();
    }
}


if (isset($_POST['add_category'])) {
    $data = $database->selectALL('category');
    $validation->category = $_POST['category'];
    $error = $validation->isExist($validation->category, array_column($data, 'category'), "already exited");
    if (!strlen($error)) {
        $database->insert('category', [
            'category' => $_REQUEST['category'],
        ]);
        header('location: /blog/admin/categories');
        exit();
    } else {
        header("location: /blog/admin/add-category?" . http_build_query(['error' => $error]));
        exit();
    }
}

if (isset($_POST['delete-category'])) {
    $ids = $database->selectRecord('blogs', 'id', 'category', array_key_first($_REQUEST));
    if (isset($ids)) {
        $database->update('blogs', ['category' => 4], 'category', array_key_first($_REQUEST));
    }
    $database->delete('category', 'id', array_key_first($_REQUEST));
    header('location: /blog/admin/categories');
}

if (isset($_POST['update_category'])) {
    $data = $database->selectALL('category');
    $validation->category = $_POST['category'];
    $error = $validation->isExist($validation->category, array_column($data, 'category'), "already existed");
    if (!strlen($error)) {
        $database->update('blogs', ['category' => 4], 'category', array_key_first($_REQUEST));
        $database->update('category', ['category' => $_POST['category']], 'id', array_key_first($_REQUEST));
        header('location: /blog/admin/categories');
        exit();
    } else {
        header("location: /blog/admin/add-category?" . http_build_query(['error' => $error]));
        exit();
    }
}

if (isset($_POST['update-blog'])) {
    $category = $database->selectALL('category');
    $validation->title = trim($_POST['title']);
    $validation->author = trim($_POST['author']);
    $validation->content = trim($_POST['content']);
    $validation->category = trim($_POST['category']);
    $validation->post = $_FILES['post'];

    foreach ($category as $key => $value) {
        if ($value['category'] == $validation->category) {
            $id = $value['id'];
        }
    }

    $data = $database->selectALL('blogs');
    $titles = array_column($data, 'title');
    $title=$database->selectRecord('blogs','title','id',array_key_first($_REQUEST));
    $TitleError = $validation->isTitleValid($validation->title, $titles);
    $CurrentTitle=array_column($title,'title');
       
    $authorError = $validation->isAuthorValid($validation->author);
    $categoryError = $validation->notEmpty($validation->category, "Please select a category");
    $contentError = $validation->isContentValid($validation->content);
    $postError =$validation->isPostImageValid();

    if (!strlen($TitleError) && !strlen($contentError) && !strlen($authorError) && !strlen($categoryError)) {
        
        $database->update('blogs', [
            'title' => $_REQUEST['title'],
            'content' => $_REQUEST['content'],
            'author' => $_REQUEST['author'],
            'category' => $id,
            'post' => $_FILES['post']['name'],
        ], 'id', array_key_first($_REQUEST));
        header('location: /blog/admin/blogs');
        exit();

    } else {
        header("location: /blog/admin/add-blog?" . http_build_query(['TitleError' => $TitleError, 'ContentError' => $contentError, 'AuthorError' => $authorError, 'CategoryError' => $categoryError, 'PostError' => $PostError, 'categoryId' => $categoryId, 'title' => $validation->title, 'author' => $validation->author, 'content' => $validation->content, 'category' => $validation->category, 'post' => $validation->post, ]));
        exit();
    }
}

if (isset($_POST['admin_login'])) {
    $AllAdmins = $database->selectALL('admin');
    $email = $_POST['admin_email_login'];
    $password = $_POST['admin_password_login'];

    if (in_array($email, array_column($AllAdmins, 'email'))) {
        if (in_array($password, array_column($AllAdmins, 'password'))) {
            $id = array_column($AllAdmins, 'id');
            $_SESSION['loginAdmin'] = $id[0];
            header("location: /blog/admin/blogs");
        } else {
            header("location: /blog/admin?" . http_build_query(['passwordError' => "Wrong Password", 'email' => $email, 'password' => $password]));
        }
    } else {
        header("location: /blog/admin?" . http_build_query(['emailError' => "You are no registered", 'email' => $email, 'password' => $password]));
    }
}

if (isset($_POST['log_out_admin'])) {
    unset($_SESSION['loginAdmin']);
    header("location: /blog/admin");
}




