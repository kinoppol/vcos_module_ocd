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