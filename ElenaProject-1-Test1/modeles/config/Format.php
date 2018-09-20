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
    function redirect($message, $class, $url, $nomPage, $seconds = 3)
    {
        echo "  <div class='row' style='margin-top:100px'>
                    <div class='col-md-8 col-md-offset-2 alert alert-$class text-center' >
                        $message
                    </div>
                </div>";

        echo "  <div class='row' style='margin-top:100px'>
                    <div class='col-md-8 col-md-offset-2 alert alert-info text-center'>
                        Vous serez redirigé vers $nomPage après $seconds secondes.
                    </div>
                </div>";
        header("refresh: $seconds; url=$url");
        exit();
    }
}
?>