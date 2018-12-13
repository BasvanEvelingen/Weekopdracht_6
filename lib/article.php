<?php
/**
 * Article
 * @author Bas van Evelingen <BasvanEvelingen@me.com>
 * @version 0.3
 * @todo testing
 */
namespace rewinkel\article {

    class Article {

        private $id;
        private $name;
        private $user_id;
        private $price;
        private $description;
        private $picture;
        private $bid_id;
        private $paymethods;
        private $category;
    
        public function __construct($name,$user_id,$price,$description,$picture,$category) {
            $this->name = $name;
            $this->user_id = $user_id;
            $this->price = $price;
            $this->decription = $description;
            $this->picture = $picture;
            $this->category = $category;
        }

        public function getArticle() {

        }

        public function updateArticle($article_id,$name,$price,$description,$picture,$category) {

        }

        public function deleteArticle($article_id) {
            
        }




    
    
    
    
    
    }
}
