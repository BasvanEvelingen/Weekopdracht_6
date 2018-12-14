<?php
/**
 * Article
 * @author Bas van Evelingen <BasvanEvelingen@me.com>
 * @version 0.3
 * @todo testing
 */
namespace rewinkel\article {

    use PDO;
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
        private $pdo;


        /**
         * Constructor
         *
         * @param string $name
         * @param string $user_id
         * @param float  $price
         * @param string $description
         * @param string $picture
         * @param string $category
         */
        public function __construct($name,$user_id,$price,$description,$picture,$category) {
            $this->name = $name;
            $this->user_id = $user_id;
            $this->price = $price;
            $this->decription = $description;
            $this->picture = $picture;
            $this->category = $category;
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('INSERT INTO article (name, user_id, price, description, picture, category) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$name,$user_id,$price,$description,$picture,$category]);
              
        }

        /**
         * Connection initialisatie functie
         * @param string $connectionString DB connection string.
         * @param string $user DB gebruiker.
         * @param string $password DB wachtwoord.
         * @return bool 
         */
        public function dbConnect($connectionString, $user, $password) {
            if (session_status() === PHP_SESSION_ACTIVE) {
                try {
                    $pdo = new \PDO($connectionString, $user, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo = $pdo;
                    return true;
                } catch (PDOException $e) {
                    $this->msg = 'Databaseconnectie mislukt.';
                    return false;
                }
            } else {
                $this->msg = 'Sessie niet gestart.';
                return false;
            }
        }




        public function getArticle() {

        }

        public function updateArticle($article_id,$name,$price,$description,$picture,$category) {

        }

        public function deleteArticle($article_id) {
            
        }




    
    
    
    
    
    }
}
