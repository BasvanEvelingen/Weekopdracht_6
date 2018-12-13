<?php
/**
 * Bid
 * @author Bas van Evelingen <BasvanEvelingen@me.com>
 * @version 0.1
 */
namespace rewinkel\bid {

    use PDO;

    class Bid 
    {

        private $id;
        private $article_id;
        private $bid;
        private $user_id;

        public function __construct($article_id,$user_id,$bid) {
            $this.article_id = $article_id;
            $this.user_id = $user_id;
            $this.bid = $bid;
        }

        
        




    }
    


}
