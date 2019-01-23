<?php 
include_once 'libs/Database.php';
class Posts
{
    public function getAllPosts(){
        $db = new Database();
        $db->select()->from('posts');
        return $db->get();
    }
    public function getPostById(){
        $db = new Database();
        $id = '10';
        $db->select()->from('posts')->where('id',$id);
        return $db->get();
    }
    public function insertPost($slug, $title, $content, $author, $photo, $time, $active){
        $db = new Database();
        $db->insert()
        ->into('`posts`')
        ->row(['`slug`','`title`','`content`','`author`','`photo`','`createtime`','`active`'])
        ->value("'$slug', '$title', '$content', '$author', '$photo', '$time', '$active'");
        return $db->get();
    }
    public function updatePost($id, $slug, $title, $content, $photo, $time){
        $db = new Database();
        $id = '10';
        $db->update('posts')
        ->set([
            '`slug`' => $slug,
            '`title`' => $title,
            '`content`' => $content,
            '`photo`' => $photo,
            '`createtime`' => $time
        ])->where('id',$id);
        return $db->get();
    }
    public function deletePost(){
        
    }
}