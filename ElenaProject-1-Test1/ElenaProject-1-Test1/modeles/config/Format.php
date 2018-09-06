<?php
class Format{

    public function textShorten($text, $limit = 400)
    {       
        $text = substr($text, 0, $limit);      
        $text = $text.".....";
        return $text;
    }
    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>