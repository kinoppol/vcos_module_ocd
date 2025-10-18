<?php
class ocd_config{
    function signing(){
        global $module;
        $settingModel = $module->model('ocd_setting');
        $config_data=$settingModel->getConfig();
        $data['title']='ตั้งค่าการลงนาม';
        //print_r($config_data);
        $data['content']=$module->view('config/signing_form',$config_data);
        return $data;

    }

    function save_signing(){
        global $module;
        $settingModel = $module->model('ocd_setting');
        foreach($_POST as $id=>$value){
            $settingModel->update_config_if_empty_create($id,$value);
        }
        $ret['title']='โปรดรอสักครู่..';
        $ret['content']=redirect(module_url('ocd','ocd_config','signing'));
        return $ret;

    }
}