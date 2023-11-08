<?php 
    namespace App\Models\tools;

    class InputCheck {

        public static function sanitize($text){
            $text = strip_tags($text);
            $text = htmlspecialchars($text);
            return $text;
        }

    }
?>