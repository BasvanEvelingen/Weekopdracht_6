<?php
/**
 * USER CLASS LOGIN|LOGOUT|REGISTER
 * @author Bas van Evelingen <BasvanEvelingen@me.com>
 * @version 0.5
 * @todo testing
 */
namespace rewinkel\user {

    class User
    {
        private $pdo;   // dbase connectie referentie
        private $user;  // gebruiker object
        private $msg;   // foutberichten
        private $permitedAttemps = 5;   // aantal keren proberen in te loggen

        /**
         * Connection initialisatie functie
         * @param string $connectionString DB connection string.
         * @param string $user DB gebruiker.
         * @param string $password DB wachtwoord.
         * @return bool 
         */
        public function dbConnect($connectionString, $user, $password)
        {
            if (session_status() === PHP_SESSION_ACTIVE) {
                try {
                    $pdo = new PDO($connectionString, $user, $password);
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

        /**
         * Return de ingelogte gebruiker.
         * @return user
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * Login functie
         * @param string $email User email.
         * @param string $password User wachtwoord
         * @return bool 
         */
        public function login($email, $password)
        {
            if (is_null($this->pdo)) {
                $this->msg = 'Databaseconnectie mislukt.';
                return false;
            } else {
                $pdo = $this->pdo;
                $stmt = $pdo->prepare('SELECT id, name, surname, email, password, role FROM users WHERE email = ?');
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if (password_verify($password, $user['password'])) {
                    $this->user = $user;
                    session_regenerate_id();
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['name'] = $user['name'];
                    $_SESSION['user']['surname'] = $user['surname'];
                    $_SESSION['user']['email'] = $user['email'];
                    $_SESSION['user']['role'] = $user['role'];
                    return true;
                } else {
                    $this->msg = 'Fout wachtwoord en/of gebruikersnaam combinatie';
                    return false;
                }
            }
        }

        /**
         * Registreer een nieuwe account
         * @param string $email User email.
         * @param string $name User voornaam
         * @param string $surname User achternaam
         * @param string $password User wachtwoord
         * @return bool 
         */
        public function registration($email, $name, $surname, $password)
        {
            $pdo = $this->pdo;
            if ($this->checkEmail($email)) {
                $this->msg = 'Deze email is al in gebruik, kies een andere.';
                return false;
            }
            if (!(isset($email) && isset($name) && isset($surname) && isset($pass) && filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $this->msg = 'Vul alle verplichte velden in.';
                return false;
            }

            $password = $this->hashPass($password);
            $stmt = $pdo->prepare('INSERT INTO user (name, surname, email, password) VALUES (?, ?, ?, ?)');
            if ($stmt->execute([$name, $surname, $email, $password])) {
               return true;
            } else {
                $this->msg = 'Registreren mislukt.';
                return false;
            }
        }
       
        /**
         * Wachtwoord veranderen
         * @param int $id User id.
         * @param string $pass nieuw wachtwoord.
         * @return bool 
         */
        public function passwordChange($id, $password)
        {
            $pdo = $this->pdo;
            if (isset($id) && isset($password)) {
                $stmt = $pdo->prepare('UPDATE user SET password = ? WHERE id = ?');
                if ($stmt->execute([$id, $this->hashPass($password)])) {
                    return true;
                } else {
                    $this->msg = 'Wachtwoord veranderen mislukt.';
                    return false;
                }
            } else {
                $this->msg = 'Voer gebruikersnaam en wachtwoord in.';
                return false;
            }
        }

        /**
         * Rol toekennen
         * @param int $id User id.
         * @param int $role User role.
         * @return bool 
         */
        public function assignRole($id, $role)
        {
            $pdo = $this->pdo;
            if (isset($id) && isset($role)) {
                $stmt = $pdo->prepare('UPDATE user SET role = ? WHERE id = ?');
                if ($stmt->execute([$id, $role])) {
                    return true;
                } else {
                    $this->msg = 'Toekennen rol mislukt.';
                    return false;
                }
            } else {
                $this->msg = 'Ken de user een rol toe.';
                return false;
            }
        }

        /**
         * Gebruikers informatie veranderen
         * @param int $id User id.
         * @param string $name User voornaam.
         * @param string $surname User achternaam.
         * @return boolean of success.
         */
        public function userUpdate($id, $name, $surname)
        {
            $pdo = $this->pdo;
            if (isset($id) && isset($name) && isset($surname)) {
                $stmt = $pdo->prepare('UPDATE user SET name = ?, surname = ? WHERE id = ?');
                if ($stmt->execute([$id, $name, $surname])) {
                    return true;
                } else {
                    $this->msg = 'Gebruikersinformatie veranderen mislukt.';
                    return false;
                }
            } else {
                $this->msg = 'Geldige informatie invoeren.';
                return false;
            }
        }

        /**
         * Email nog beschikbaar
         * @param string $email User email.
         * @return bool wanneer beschikbaal
         */
        private function checkEmail($email)
        {
            $pdo = $this->pdo;
            $stmt = $pdo->prepare('SELECT id FROM user WHERE email = ? limit 1');
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Password hash functie
         * @param string $password User wachtwoord
         * @return string $password Hashed wachtwoord
         */
        private function hashPass($pass)
        {
            return password_hash($pass, PASSWORD_DEFAULT);
        }

        /**
         * Print error msg functie
         * @return void.
         */
        public function printMsg()
        {
            print $this->msg;
        }

        /**
         * Uitloggen gebruiker en verwijderen uit sessie.
         * @return true
         */
        public function logout()
        {
            $_SESSION['user'] = null;
            session_regenerate_id();
            return true;
        }

        /**
         * Alle gebruikers weergeven
         * @return array 
         */
        public function listUsers()
        {
            if ($_SESSION['user']['user_role'] == 2) {
                if (is_null($this->pdo)) {
                    $this->msg = 'Databaseconnectie mislukt.';
                    return [];
                } else {
                    $pdo = $this->pdo;
                    $stmt = $pdo->prepare('SELECT id, name, surname, email FROM user');
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    return $result;
                }
            } else {
                $this->msg = 'U beschikt niet over genoeg rechten.';
            }
        }
    } //einde class
} // einde namespace
