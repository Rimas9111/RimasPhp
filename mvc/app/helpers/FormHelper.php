<?php 
namespace App\Helpers;
class FormHelper
{
    private $form = '';

    public function __construct($method, $action)
    {
        $this->form .= '<form method="'.$method.'" action="'.$action.'">';
    }

    public function input($attributes){
        $this->form .= '<input ';
            foreach ($attributes as $key => $attr){
                $this->form .= $key.'="' . $attr .'" ';
            }
        $this->form .= '>';
        return $this;
    }

    public function get(){
        $this->form .= '</form>';
        return $this->form;
    }

    public function select($options, $attributes){
            $this->form .= '<select ' ;
                foreach ($attributes as $key => $attr){
                    $this->form .= $key .'="' . $attr .'" ';
        }
        $this->form .= '>';

            foreach ($options as $key => $attr){
                $this->form .= $key.'<option value="' . $attr .'">' . $attr .'</option>';
            }
            
        $this->form .= '</select>';
        return $this;
    }
    public function textarea($attributes, $content =''){
        $this->form .= '<textarea ';
            foreach ($attributes as $key => $attr){
                $this->form .= $key.'="' . $attr .'" ';
            }
        $this->form .= '>' .$content .'</textarea>';
        return $this;
    }
}

?>