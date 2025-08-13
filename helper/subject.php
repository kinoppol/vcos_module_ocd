<?php

function sj_code($str=''){
    $ret='';
    if(mb_strlen($str)<=10){
        return $str;
    }else{
        return mb_substr($str,5,10);
    }
}