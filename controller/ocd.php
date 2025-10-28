<?php
class ocd{
  function timetables(){
    global $module;
    //$semester=base64_decode($param['semester']);

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

    $current_semester=array('semester'=>$semester,);
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
    $semester_model=$module->model('semester');
    $all_semester=$semester_model->getSemester();
    $semesters=array();
    foreach($all_semester as $k=>$v){
      $semesters[$k]=$k;
    }
    
    if(!empty($_POST['semester'])){
      $_SESSION['semester']=$_POST['semester'];
    }

    if(empty($_SESSION['semester'])){
      $semester=$semester_model->getCurrentSemester();
      $_SESSION['semester']=$semester;
    }else{
      $semester=$_SESSION['semester'];
    }
    $data['semesters']=$semesters;
    $data['semester']=$semester;
    $ret['content'] = $module->view('claim/filter',$data);
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
    $data['timeSlot']=$timeTable_model->getTimetableSlot($con);
    //print_r($data['timetables']);
    $data['teacher']=$teacher_data[$param['tid']];
    $data['semester']=base64_decode($param['semester']);
    $data['module']=$module;
    $ocd_config_model=$module->model('ocd_config');
    $data['ocd_config_model']=$ocd_config_model;
    $data['timeTable_model']=$timeTable_model;
    $ret['content']=$module->view('timetable/config',$data);
    $ret['title']='ตั้งค่าการเบิก';
    return $ret;
  }

  function saveConfig(){
    global $module;
    global $param;
    $ocd_config_model=$module->model('ocd_config');
    foreach($_POST['timetable_status'] as $k=>$v){
      $key=array();
      list($key['semester'],$key['teacher_id'],$key['day_of_week_no'],$key['time_start'])=explode('-',$k);
      //$key['time_range']=$time_start.'-'.$time_end;
      $ocd_config_model->setConfig($key,$v);
    }

    $ret['content']=redirect(module_url('ocd','ocd','timetableConfig').'/semester/'.$param['semester'].'/tid/'.$param['tid']);
    return $ret;

  }

}