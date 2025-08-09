<?php
helper("model/dummy_model");
class ocd_config extends dummy_model{
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function setConfig($key=array(),$status='in'){
        $sql='select * from ocd_timetable_config';
        if(count($key)>=1){
            $sql.= ' where '.arr2and($key);
        }
        $result=$this->db->query($sql);
        if($result->num_rows>0){
            return $this->updateConfig($key,$status);
        }else{
            return $this->addConfig($key,$status);
        }
    }

    function addConfig($key=array(),$status='in'){
        $sql='insert into ocd_timetable_config set '.arr2set($key).',status='.pq($status);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;
    }    

    function updateConfig($key=array(),$status='in'){
        $sql='update ocd_timetable_config set status='.pq($status).' where '.arr2and($key);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;
    }

    function getConfig($data=array()){
        $sql='select * from ocd_timetable_config';
        if(count($data)>=1){
            $sql.= ' where '.arr2and($data);
        }
        $result=$this->db->query($sql);
        $ret=array();
        while($r=$result->fetch_assoc()){
            $ret[]=$r;
        }
        return $ret;
    }

}