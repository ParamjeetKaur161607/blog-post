<?php require 'core/validation.php'; ?>
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


    foreach ($category as $key => $value) {
        if ($value['category'] == $_REQUEST['category']) {
            $id = $value['id'];
        }
    }
    $database->insert('blogs', [
        'title' => $_REQUEST['title'],
        'content' => $_REQUEST['content'],
        'author' => $_REQUEST['author'],
        'category' => $id,
        'post' => $_FILES['post']['name'],
    ]);
    header('location: /blog/admin/blogs');
}
if (isset($_POST['add_category'])) {
    $data=$database->selectALL('category');    
    $status=$validation->isCategoryValid(array_column($data,'category'));
    if(!isset($status)){
        $database->insert('category', [
            'category' => $_REQUEST['category'],
        ]);
        header('location: /blog/admin/blogs');
    }
    
}

if (isset($_POST['delete-category'])) {
    $ids=$database->selectRecord('blogs','id','category',array_key_first($_REQUEST));
    if(isset($ids)){
        $database->update('blogs', ['category'=>4], 'category', array_key_first($_REQUEST));
    }
    $database->delete('category', 'id', array_key_first($_REQUEST));
    header('location: /blog/admin/categories');
}

if (isset($_POST['update_category'])) {
    $database->update('blogs', ['category'=>4], 'category', array_key_first($_REQUEST));
    $database->update('category', ['category'=>$_POST['category']], 'id', array_key_first($_REQUEST));
    header('location: /blog/admin/categories');
}

if (isset($_POST['update-blog'])) {
    $category = $database->selectALL('category');


    foreach ($category as $key => $value) {
        if ($value['category'] == $_REQUEST['category']) {
            $id = $value['id'];
        }
    }
    $database->update('blogs', [
        'title' => $_REQUEST['title'],
        'content' => $_REQUEST['content'],
        'author' => $_REQUEST['author'],
        'category' => $id,
        'post' => $_FILES['post']['name'],
    ], 'id', array_key_first($_REQUEST));
    header('location: /blog/admin/blogs');
}




