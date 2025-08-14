<?php

function cell($data=array()){
    $ret='';

    $colspan='';
    if($data['time_total']>1)$colspan=' colspan="'.$data['time_total'].'"';
    $subject_code=sj_code($data['subject_code']);
    $student_group='xxx';
    $room=$data['room'];
    $ret='<td'.$colspan.' align="center" valign="middle" style=" font-weight: normal; border-right: 1px solid #000; border-bottom: 1px solid #000; "><div>'.$subject_code.'</div><div>'.$room.'</div><div>'.$student_group.'<div></div></div></td>';

    return $ret;
}

function empty_cell($label='&nbsp;'){

    $ret='<td style="border:1px solid #000; font-size:14px; text-align:center">'.$label.'</td>';

    return $ret;
}