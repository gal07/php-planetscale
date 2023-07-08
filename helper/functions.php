<?php

function getProducts($mysqli) {
    $sql = "SELECT * FROM products ORDER BY name ASC";
    return $mysqli->query($sql);
}

function getCategoryName($mysqli, $id) {
    $sql = "SELECT name FROM categories WHERE `id` = '$id'";
    $name = mysqli_fetch_row($mysqli->query($sql));
    return $name[0];
}

function getallCategory($mysqli){
    $sql = "SELECT * FROM categories";
    return $mysqli->query($sql);
}

function deleteProduct($mysqli,$id){
    $id_product = (int)$id;

    $delete = $mysqli->prepare("DELETE FROM products WHERE id=?");
    $delete->bind_param("s",$id_product);

    if ($delete->execute()) {
        return true;
    }else{
        return false;
    }
}

function createProduct($mysqli,$post){

    $name = (string)$post["name"];
    $description = (string)$post["description"];
    $image = (string)$post["image"];
    $category_id = (int)$post["category_id"];

    $create = $mysqli->prepare("INSERT INTO products (`name`, `description`, `image`,`category_id`) VALUES (?, ?, ?, ?)");
    $create->bind_param("ssss",$name, $description, $image, $category_id);

    if ($create->execute()) {
        return true;
    }else{
        return false;
    }
}