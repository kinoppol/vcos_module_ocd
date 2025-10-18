<?php
helper("model/dummy_model");
class ocd_setting extends dummy_model{
    function __construct($db_ref){
        parent::__construct($db_ref);
    }

    function addConfig($key='',$value=''){
        $sql='insert into ocd_config set id='.pq($key).',value='.pq($value);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;
    }    

    function updateConfig($key='',$value=''){
        $sql='update ocd_config set id='.pq($key).',value='.pq($value);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;
    }

    function getConfig($data=array()){
        $sql='select * from ocd_config';
        if(count($data)>=1){
            $sql.= ' where '.arr2and($data);
        }
        $result=$this->db->query($sql);
        $ret=array();
        while($r=$result->fetch_assoc()){
            $ret[$r['id']]=$r['value'];
        }
        return $ret;
    }

    
    function update_config_if_empty_create($key,$value){
      $chk=$this->getConfig(array('id'=>$key));
      if(count($chk)<1){
        //print 'Create';
        $result=$this->addConfig($key,$value);
      }else{
        //print 'Update';
        $result=$this->updateConfig($key,$value);
      }

      return $result;
    }

}