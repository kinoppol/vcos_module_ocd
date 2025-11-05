<?php
helper("model/dummy_model");
class rms_db extends dummy_model{
    function __construct($db_ref){
        parent::__construct($db_ref);
    }

    function get_dep($data=array()){
        $sql='select * from rms_department';
        if(count($data)>=1){
            $sql.= ' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);
        $ret=array();
        while($r=$result->fetch_assoc()){
            $ret[$r['dep_id']]=$r['dep_name'];
        }
        return $ret;
    }

}