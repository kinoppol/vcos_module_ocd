<?php

function gen_radio($data=array()){
    $ret='';
    foreach($data['items'] as $k=>$v){
        $checked='';
        if($k==$data['def'])$checked=' checked';
        $ret.='<div class="form-check form-check-inline mt-4">
            <input name="'.$data['name'].'" class="form-check-input" type="radio" value="'.$k.'"'.$checked.'/>
            <label class="form-check-label" for="disabledRadio1">'.$v.'</label>
        </div>';
    }
    
    return $ret;
}