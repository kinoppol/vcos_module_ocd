<?php
class ocd{
  function timetables(){
    global $module;
    $ret['content'] = $module->view('home/timetable');
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