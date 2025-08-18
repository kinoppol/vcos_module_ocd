<?php
class ocd_print{
  function timetableOnlyCounted(){
    return $this->timetable('onlyCounted');
  }
  function timetable($show='all'){
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
    $timetableSlot=$timeTable_model->getTimetableSlot($con);
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

    //print_r($timetableSlot);
    $time_range=array(
        '08.00',
        '09.00',
        '10.00',
        '11.00',
        '12.00',
        '13.00',
        '14.00',
        '15.00',
        '16.00',
        '17.00',
        '18.00',
        '19.00',
    );
    $week_slot=array(
        'จันทร์'=>array(),
        'อังคาร'=>array(),
        'พุธ'=>array(),
        'พฤหัสบดี'=>array(),
        'ศุกร์'=>array(),
        //'เสาร์'=>array(),
        //'อาทิตย์'=>array(),
    );

    foreach($week_slot as $k=>$v){
        foreach($time_range as $tr){
            $week_slot[$k][$tr]=array();
            foreach($timetableSlot as $ts){
                if($ts['day_of_week']==$k && mb_substr($ts['time_range'],0,5)==$tr){                
                    $week_slot[$k][$tr]=$ts;
                }
            }
        }
    }

      
    $data['week_slot']=$week_slot;
    $data['subject_list']=$subject_list;
    $data['module']=$module;
    $data['show']=$show;
    $data['timeTable_model']=$timeTable_model;
    $result = $module->view('print/timeTable',$data);
    $ret['content']=$result;
    return $ret;
  }
}