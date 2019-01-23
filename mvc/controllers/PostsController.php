<?php
include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
include_once '/wamp64/www/RimasPhp/mvc/models/Posts.php';
include_once '/wamp64/www/RimasPhp/mvc/helpers/FormHelper.php';
include_once '/wamp64/www/RimasPhp/mvc/helpers/Helper.php';

class PostsController extends Controller
{
    public function index()
    {

        $posts= new Posts();
        // echo 'visi irasai';
        $this->view->title = 'titlas';
        $this->view->posts = $posts->getAllPosts();

        $this->view->headline = 'Musu headlinas';
        // $this->view->render('header');
        $this->view->render('posts');

    }
    // public function show(){
    //     echo 'show irasai';
    // }
    public function show($id){
        echo $id;
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
        
        ])->input([
            'name' => "public",
            'type' => "checkbox",
            'value' => 1
        ]);
        $form->select([
            '1' => "vienas",
            '2' => "du",
            '3' => "trys"
        ],[
            'name' => 'selectas',
            'class' => 'klase' 
        ]);

        $form->textarea([
            'rows' => "2",
            'cols' => "50",
            'name' => "content",
            'class' => ""
        ]);
        $form->input([
            'name' => "submit",
            'type' => "submit",
            'value' => "Add"
        ]);

        echo $form->get();
    }

    public function store(){
        $post = new Posts;
        if(isset($_POST['submit'])){
            $slug = Helper::getSlug($_POST['title']);
            $title = $_POST['title'];
            $photo = $_POST['photo'];
            $author = '1';
            $content = $_POST['content'];
            $time = date('Y-m-d H:i:s');
            $active = '1';
            $post->insertPost($slug, $title, $photo, $author, $content, $time, $active);
        }
    }

    public function edit($id){
        $form = new FormHelper('POST','http://localhost/rimasphp/mvc/index.php/posts/update/');
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
                'value' => $info['content']
            ]);
            $form->input([
                'name' => "update",
                'type' => "submit",
                'value' => "update"
            ]);

        echo $form->get();
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    // public function test(){
    //     $slug = Helper::getSlug('Posto Pavadinimas');
    //     echo $slug;
    // }

}
 
?>