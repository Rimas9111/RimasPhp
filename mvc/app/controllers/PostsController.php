<?php
namespace App\Controllers;

use App\Libs\Controller;

use App\Models\Posts;

use App\Models\Users;

use App\Models\userPosts;

use App\Helpers\FormHelper;

use App\Helpers\Helper;

// include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
// include_once '/wamp64/www/RimasPhp/mvc/models/Posts.php';
// include_once '/wamp64/www/RimasPhp/mvc/helpers/FormHelper.php';
// include_once '/wamp64/www/RimasPhp/mvc/helpers/Helper.php';

class PostsController extends Controller
{
    public function index()
    {

        $posts= new Posts();
        // echo 'visi irasai';
        $this->view->title = 'Posts';
        $this->view->posts = $posts->getAllPosts();

        $this->view->headline = 'Musu headlinas';
        // $this->view->render('header');
        $this->view->render('posts');

    }

    public function ajax()
    {

        // $posts= new Posts();
        // echo 'visi irasai';
        $this->view->title = 'Ajax';

        $this->view->headline = 'Musu headlinas';
        $this->view->render('ajaxLesson');

    }
    // public function show($id){
    //     echo $id;
    // }
    public function show($id){
		$this->view->title = 'Post';
		$posts = new Posts();
		$postsArray = [];
		$allPosts = $posts->getPostById($id);
		while ($postInfo = $allPosts->fetch_assoc()) {
			$postAuthorId = $postInfo['author'];
			$users = new Users();
			$currentUser = $users->getUserById($postAuthorId);
			while ($authorName = $currentUser->fetch_assoc()){
				$postInfo['author'] = $authorName;
			}
			$postsArray[] = $postInfo;
		}
        $this->view->posts = $postsArray;
        $this->view->render('postId');    
    }

    public function add(){
        $form = new FormHelper('POST','http://localhost/rimasphp/mvc/index.php/posts/store/');

        $form->input([
            'name' => "title",
            'type' => "text",
            // 'class' => "bootsrap",
            'placeholder' => "Title"         

        ])->input([
            'name' => "photo",
            'type' => "text",
            'placeholder' => "Image URL"
        
        // ])->input([
        //     'name' => "public",
        //     'type' => "checkbox",
        //     'value' => 1
        ]);
        // $form->select([
        //     '1' => "vienas",
        //     '2' => "du",
        //     '3' => "trys"
        // ],[
        //     'name' => 'selectas',
        //     'class' => 'klase' 
        // ]);

        $form->textarea([
            'rows' => "2",
            'cols' => "50",
            'name' => "content",
            'class' => ""
        ], "content");
        
        $form->input([
            'name' => "submit",
            'type' => "submit",
            'value' => "Add"
        ]);
        $this->view->title = 'Posts';
        $this->view->index = 'Posts';// Posts
        $this->view->form = $form->get();
        $this->view->render('userPosts');
        // echo $form->get();
    }

    public function store(){
        $post = new Posts;
        if(isset($_POST['submit'])){
            $slug = Helper::getSlug($_POST['title']);
            $title = $_POST['title'];
            $photo = $_POST['photo'];
            $author = $_SESSION['id'];
            $content = $_POST['content'];
            $time = date('Y-m-d H:i:s');
            $active = '1';
            $post->insertPost($slug, $title, $content, $author, $photo, $time, $active);
            header('Location: http://localhost/rimasphp/mvc/index.php');
        }
    }

    public function edit($id){
        $form = new FormHelper('POST','http://localhost/rimasphp/mvc/index.php/posts/update/'.$id);
        $posts = new Posts();
        $post = $posts->getPostById($id);
        $info = $post->fetch_assoc();

            $form->input([
                'name' => "title",
                'type' => "text",
                // 'class' => "bootsrap",
                'placeholder' => "Title",
                'value' => $info['title']           
    
            ])->input([
                'name' => "photo",
                'type' => "text",
                'placeholder' => "Image URL",
                'value' => $info['photo']
            ]);
    
            $form->textarea([
                'rows' => "2",
                'cols' => "50",
                'name' => "content",
                
            ],$content = $info['content']);
            $form->input([
                'name' => "update",
                'type' => "submit",
                'value' => "update"
            ]);
            
            $form->input([
                'name' => 'delete',
                'type' => 'submit',
                'value' => 'delete'
            ]);

        echo $form->get();
    }

    public function update($id){
        $posts = new Posts();
        if(isset($_POST['update'])){
            $title = $_POST['title'];
            $slug = Helper::getSlug($_POST['title']);
            $content = $_POST['content'];
            $photo = $_POST['photo'];
            $time = date("Y-m-d H:i:s");
            $posts->updatePost($id, $slug, $title, $photo, $content, $time);
        } else {
            if(isset($_POST['delete'])){
                $this->delete($id);
            }
        }
    }

        public function test(){
        $username = $_POST['myusername'];
        // echo $username;
        $slug = Helper::getSlug($username);
        echo $slug;
    }




    // public function test(){
    //     $slug = Helper::getSlug('Posto Pavadinimas');
    //     echo $slug;
    // }

}
 
?>