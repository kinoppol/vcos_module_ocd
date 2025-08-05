<?php
class ocd{
  function timetables(){
    global $module;
    $user_model=$module->model('teacher');
    $teacher=$user_model->getTeacher();

    $timeTable_model=$module->model('timeTable');

    $semester='1/2568';
    $current_semester=array('semester'=>$semester);
    $tids=$timeTable_model->getTeacher($current_semester);//เลือกเฉพาะครูที่มีตารางสอน

    $data=array('teachers'=>$teacher,'tids'=>$tids,'semester'=>$semester);

    $ret['content'] = $module->view('home/timetableTeacher',$data);
    $ret['title'] = 'ตารางสอน';
    return $ret;
  }
  function claim_form(){
    global $module;
    $ret['content'] = $module->view('home/claim_form');
    $ret['title'] = 'ใบเบิกค่าสอน';
    return $ret;
  }

  function api_load_user(){
    global $module;
    $module->helper('rms');
    $user=api_load_user();
    $user_model = $module->model('user');
    $user_model->clear_user();
  }

}