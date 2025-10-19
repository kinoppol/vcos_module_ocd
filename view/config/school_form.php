<?php
helper('view/card');
helper('view/form');


$form['inputs']=array(
    array(
        'type'=>'text',
        'required'=>'true',
        'placeholder'=>'วิทยาลัย...',
        'name'=>'school_name',
        'label'=>'ชื่อสถานศึกษา',
        'value'=>$school_name,
    ),array(
        'type'=>'text',
        'required'=>false,
        'placeholder'=>'13..',
        'name'=>'school_id',
        'label'=>'รหัสสถานศึกษา',
        'value'=>$school_id,
    ),array(
        'type'=>'submit',
        'value'=>'บันทึก',
    )
);

foreach($form['inputs'] as $input){
    $data['content'].=form_gen_input($input);   
}
$data['content']=form_gen_form(['content'=>$data['content'],'action'=>module_url('ocd','ocd_config','save_school')]);    

$data['title']='ข้อมูลสถานศึกษา';
//$data['content']=form_gen_input_text($form['input_text']);
print card($data);