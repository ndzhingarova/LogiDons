 <?php
   echo "hi";
   $tab = array('actuel' =>2);
   var_dump($tab);

   function f($val){
    $tab['actuel'] = $val;
    echo  $tab['actuel'];
   }
 
   echo f(6);
?>