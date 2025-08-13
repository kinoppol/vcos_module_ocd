<?php
class ocd_print{
  function timetable(){
    global $module;
    global $param;
    //print_r($param);
    $teacher_model=$module->model('teacher');
    $timeTable_model=$module->model('timeTable');

    $teacher_citizen_id=$param['tid'];
    $semester=base64_decode($param['semester']);
    //print $teacher_citizen_id;
    $con=array('semester'=>$semester,'teacher_id'=>$param['tid']);
    
    $timetables=$timeTable_model->getTimetable($con);
//print_r($timetables);
    $subject_list=array();
    foreach($timetables as $tt){
      if(empty($tt['timeTableID']))continue;
      if(empty($subject_list[$tt['subject_code']]['time_total']))$subject_list[$tt['subject_code']]['time_total']=$tt['time_total'];
        else $subject_list[$tt['subject_code']]['time_total']+=$tt['time_total'];

      if(empty($subject_list[$tt['subject_code']]['subject_name']))$subject_list[$tt['subject_code']]['subject_name']=$tt['subject_name'];
      if(empty($subject_list[$tt['subject_code']]['subject_code']))$subject_list[$tt['subject_code']]['subject_code']=$tt['subject_code'];
    }

    $teacher_data=$teacher_model->getTeacher(array('citizen_id'=>$teacher_citizen_id));
    $data['semester']=base64_decode($param['semester']);
    $data['teacher']=$teacher_data[$teacher_citizen_id];    
    $data['subject_list']=$subject_list;
    $data['module']=$module;
    $result = $module->view('print/timeTable',$data);
    $ret['content']=$result;
    return $ret;
  }
}