<?php
require_once('db.php');

function file_upload($file){
    if($file["pictures"]["size"] > 0){
        $uploads_dir = 'img/posts';
        $tmp_name = $file["pictures"]["tmp_name"];
        $name = basename($file["pictures"]["name"]);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    } else {
        $name = 'noimage.jpg';
    }        
        return $name;
}

function create_category($name){
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES (?)";
    $conn->prepare($sql)->execute([$name]);
    return $conn->lastInsertId();
}

function create_post($category_id, $title, $body, $post_image){
    global $conn;
    $sql = "INSERT INTO posts (category_id, title, body, post_image) VALUES (?,?,?,?)";
    $conn->prepare($sql)->execute([$category_id, $title, $body, $post_image]);
    return $conn->lastInsertId();
}

function get_categories(){
    global $conn;
    $sth = $conn->prepare("SELECT * FROM categories");
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function get_posts(){
    global $conn;
    $sth = $conn->prepare("SELECT * FROM posts LEFT JOIN categories ON (posts.category_id = categories.id) ORDER BY posts.id DESC");
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}