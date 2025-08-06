<?php
class ocd_print{
  function timetable(){
    global $module;
    global $param;
    //print_r($param);
    $teacher_model=$module->model('teacher');
    $teacher_citizen_id=$param['tid'];
    //print $teacher_citizen_id;
    $teacher_data=$teacher_model->getTeacher(array('citizen_id'=>$teacher_citizen_id));
    $data['semester']=base64_decode($param['semester']);
    $data['teacher']=$teacher_data[$teacher_citizen_id];
    $result = $module->view('print/timeTable',$data);
    $ret['content']=$result;
    return $ret;
  }
}