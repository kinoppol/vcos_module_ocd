<?php
helper("model/dummy_model");
class teacher extends dummy_model{
    function __construct($db_ref){
        parent::__construct($db_ref);
    }
    function getTeacher($data=array()){
        $sql='select * from user_data';
        if(count($data)>=1){
            $sql.= ' where '.arr2set($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

        $ret=array();
        while($t=$result->fetch_assoc()){
            $ret[$t['citizen_id']]=$t;
        }

        return $ret;
    }

}