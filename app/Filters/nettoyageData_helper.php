<?php

function valid_data($arrayPost){
    foreach($arrayPost as  &$data){
        if(gettype($data === 'string')){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }
    }
    return $arrayPost;
}

?>