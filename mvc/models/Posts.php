<?php 
include_once 'libs/Database.php';
class Posts
{
    public function getAllPosts(){
        $db = new Database();
        $db->select()->from('posts');
        return $db->get();
    }
    public function getPostsById(){
        $db = new Database();
        $db->select()->from('posts')->where('id',$id);
        return $db->get();
    }
    // public function getPostsBySlug(){

    // }
    // public function insertPost(){

    // }
    // public function deletePost(){

    // }
}