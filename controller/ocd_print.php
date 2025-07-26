<?php
class ocd_print{
  function timetable(){
    global $module;
    $result = $module->view('print/timeTable');
    print $result;
  }
}