<?php

use classes\Classes\Object;
class acModel extends classes\Classes\Object{
    public function complete($model, $keys, $tag, $limit = ""){
        $arr = $keys;
        $this->LoadModel($model, "model");
        $k1 = array_shift($arr);
        $k2 = array_shift($arr);
        if($k2 = $k1) $keys = array($k1);
        $tags  = explode(" ",$tag);
        $tag   = array_pop($tags);
        
        if($tag == "") return array();

        $antes = empty($tags) ? "":implode(" ", $tags);
        $where = "$k2 LIKE '$tag%'";
        $var = $this->model->selecionar($keys, $where, $limit);
        echo $this->model->db->getSentenca();
        $out = array();
        $i = 0;
        
        $count = count($keys) + 1;
        foreach($var as $array){
            $out[$i]['id']   = $antes . " " .$array[$k1];
            $out[$i]['name'] = "<div class='tokeninput_item'>$antes ";
            if($count > 1){
                $j = $count;
                while(isset($keys[$i])){
                    $out[$i]['name'] .= "<span class='".$keys[$i]."'>".$array[$keys[$i]]."</span>";
                    $j++;
                }
            }
            $out[$i]['name'] .= "</div>";
            $i++;
        }
        return $out;
    }
}

?>
