<?php
include_once '/wamp64/www/RimasPhp/mvc/libs/Controller.php';
include_once '/wamp64/www/RimasPhp/mvc/models/Posts.php';
include_once '/wamp64/www/RimasPhp/mvc/helpers/FormHelper.php';

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
        $form = new FormHelper('POST','');

        $form->input([
            'name' => "title",
            'type' => "text",
            // 'class' => "bootsrap",
            'placeholder' => "Title"

        ])->input([
            'name' => "image",
            'type' => "text",
            'placeholder' => "Image URL"
        
        ])->input([
            'name' => "public",
            'type' => "checkbox",
            'value' => 1

        ])->input([
            'name' => "submit",
            'type' => "submit",
            'value' => "Add"
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
            'name' => "textarea",
            'class' => ""
        ]);

        echo $form->get();
    }

}
 
?>