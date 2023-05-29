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
    }
?>