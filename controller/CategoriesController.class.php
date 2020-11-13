<?php
class CategoriesController extends Controller{

    public $view = 'categories';
    
    public function goods($data){
        if($data['id'] > 0){
            $good = new Good([
                "id" => $data['id']
            ]);

            return $good->getGoodInfo()[0];
        }
        else{
            header("Location: /categories/");
        }
    }
}