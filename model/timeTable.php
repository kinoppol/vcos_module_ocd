<?php
helper("model/dummy_model");
class timeTable extends dummy_model{
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function getTimetable($data=array()){
        $sql='select * from rms_timetable';
        if(count($data)>=1){
            $sql.= ' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);
        //print_r($result);
        $ret=array();
        while($t=$result->fetch_assoc()){
            //print_r($t);
            $ret[]=$t;
        }

        return $ret;
    }

    function getTimetableSlot($data=array()){
        $sql='select day_of_week,time_range,teacher_id,day_of_week_no,time_total,subject_code,room from rms_timetable';
        $sql.= ' where timeTableID !="" AND timeTableSubID != ""';
        if(count($data)>=1){
            $sql.= ' AND '.arr2and($data);
        }
        $sql.=' group by day_of_week,time_range order by day_of_week_no,time_range';
        //print $sql;
        $result=$this->db->query($sql);
        //print_r($result);
        $ret=array();
        while($t=$result->fetch_assoc()){
            //print_r($t);
            $ret[]=$t;
        }

        return $ret;
    }

    function getTeacher($data=array()){
        $sql='select distinct(teacher_id) as tid from rms_timetable';
        $sql.= ' where timeTableID !="" AND timeTableSubID != ""';
        if(count($data)>=1){
            $sql.= ' AND '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

        $ret=array();
        while($t=$result->fetch_assoc()){
            $ret[]=$t;
        }

        return $ret;
    }


}