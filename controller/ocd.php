<?php
class ocd{
  function timetables(){
    global $module;
    $user_model=$module->model('teacher');
    $teacher=$user_model->getTeacher();

    $timeTable_model=$module->model('timeTable');
    $semester_model=$module->model('semester');

    $all_semester=$semester_model->getSemester();
    
    if(!empty($_POST['semester'])){
      $_SESSION['semester']=$_POST['semester'];
    }

    if(empty($_SESSION['semester'])){
      $semester=$semester_model->getCurrentSemester();
      $_SESSION['semester']=$semester;
    }else{
      $semester=$_SESSION['semester'];
    }

    $current_semester=array('semester'=>$semester);
    $tids=$timeTable_model->getTeacher($current_semester);//เลือกเฉพาะครูที่มีตารางสอน

    $semesters=array();
    foreach($all_semester as $k=>$v){
      $semesters[$k]=$k;
    }

    $data=array('teachers'=>$teacher,'tids'=>$tids,'semester'=>$semester);
    $data['semesters']=$semesters;

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

  function timetableConfig(){
    global $module;
    global $param;
    $timeTable_model=$module->model('timeTable');
    $teacher_model=$module->model('teacher');
    $semester=base64_decode($param['semester']);
    $teacher_data=$teacher_model->getTeacher(array('citizen_id'=>$param['tid']));

    $con=array('semester'=>$semester,'teacher_id'=>$param['tid']);
    $data['timetables']=$timeTable_model->getTimetable($con);
    //print_r($data['timetables']);
    $data['teacher']=$teacher_data;
    $data['semester']=base64_decode($param['semester']);

    $ret['content']=$module->view('timetable/config',$data);
    $ret['title']='ตั้งค่าการเบิก';
    return $ret;
  }

}