<?php 
     class util{
        static public function truncateText($text, $wordLimit) {
            $words = explode(' ', $text);
            if (count($words) > $wordLimit) {
                $truncatedText = implode(' ', array_slice($words, 0, $wordLimit));
                $truncatedText .= '...';
                return $truncatedText;
            }
            return $text;
        }
        static public function logout(){
            session_destroy();
            unset($_SESSION['role']);
            header("Location: C:\PHP\htdocs\projet cahier de texte en ligne\connexion.php");
            exit();
        }
    }
?>