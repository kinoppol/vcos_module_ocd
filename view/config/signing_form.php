<?php
helper('view/card');
helper('view/form');


$form['inputs']=array(
    array(
        'type'=>'text',
        'required'=>'xxx',
        'placeholder'=>'นาย/นาง/นางสาว',
        'name'=>'director_name',
        'label'=>'ชื่อ-สกุล ผู้อำนวยการ',
        'value'=>$director_name,
    ),array(
        'type'=>'text',
        'required'=>1,
        'placeholder'=>'นาย/นาง/นางสาว',
        'name'=>'deputy_academic_name',
        'label'=>'ชื่อ-สกุล รองผู้อำนวยการฝ่ายวิชาการ',
        'value'=>$deputy_academic_name,
    ),array(
        'type'=>'text',
        'required'=>1,
        'placeholder'=>'นาย/นาง/นางสาว',
        'name'=>'deputy_resource_name',
        'label'=>'ชื่อ-สกุล รองผู้อำนวยการฝ่ายบริหารทรัพยากร',
        'value'=>$deputy_resource_name,
    ),array(
        'type'=>'text',
        'required'=>1,
        'placeholder'=>'นาย/นาง/นางสาว',
        'name'=>'deputy_plan_name',
        'label'=>'ชื่อ-สกุล รองผู้อำนวยการฝ่ายแผนงานและความร่วมมือ',
        'value'=>$deputy_plan_name,
    ),array(
        'type'=>'text',
        'required'=>1,
        'placeholder'=>'นาย/นาง/นางสาว',
        'name'=>'deputy_student_name',
        'label'=>'ชื่อ-สกุล รองผู้อำนวยการฝ่ายพัฒนากิจการนักเรียนนักศึกษา',
        'value'=>$deputy_student_name,
    ),array(
        'type'=>'submit',
        'value'=>'บันทึก',
    )
);

foreach($form['inputs'] as $input){
    $data['content'].=form_gen_input($input);   
}
$data['content']=form_gen_form(['content'=>$data['content'],'action'=>module_api('ocd','ocd_config','save_signing')]);    

$data['title']='รายชื่อผู้บริหาร';
//$data['content']=form_gen_input_text($form['input_text']);
print card($data);