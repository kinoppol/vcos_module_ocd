<?php
helper('view/card');
helper('view/form');


$form['inputs']=array(
    array(
        'type'=>'text',
        'required'=>'true',
        'placeholder'=>'40',
        'name'=>'group_full',
        'label'=>'จำนวนนักศึกษาต่อ 1 กลุ่ม',
        'value'=>$group_full,
    ),array(
        'type'=>'text',
        'required'=>true,
        'placeholder'=>'20',
        'name'=>'group_normal',
        'label'=>'จำนวนนักศึกษาที่ถือว่าครบ 1 กลุ่ม',
        'value'=>$group_normal,
    )
);
$inputstr=array();
foreach($form['inputs'] as $input){
    $inputstr['content'].=form_gen_input($input);   
}
$inputstr['title']='การจัดกลุ่มนักศึกษา';
$data['content']=card($inputstr);

$form['inputs']=array(
    array(
        'type'=>'text',
        'required'=>'true',
        'placeholder'=>'24',
        'name'=>'workhour_special_teacher',
        'label'=>'ครูอัตราจ้าง',
        'value'=>$workhour_special_teacher,
    ),array(
        'type'=>'text',
        'required'=>true,
        'placeholder'=>'12',
        'name'=>'workhour_ge_teacher',
        'label'=>'พนักงานราชการครู',
        'value'=>$workhour_ge_teacher,
    ),array(
        'type'=>'text',
        'required'=>true,
        'placeholder'=>'12',
        'name'=>'workhour_go_teacher',
        'label'=>'ข้าราชการครู',
        'value'=>$workhour_go_teacher,
    ),array(
        'type'=>'submit',
        'value'=>'บันทึก',
    )
);
$inputstr=array();
foreach($form['inputs'] as $input){
    $inputstr['content'].=form_gen_input($input);   
}
$inputstr['title']='กำหนดค่าภาระงาน';
$data['content'].=card($inputstr);

$data['content']=form_gen_form(['content'=>$data['content'],'action'=>module_api('ocd','ocd_config','save_condition')]);    
//$data['content']=form_gen_input_text($form['input_text']);
print $data['content'];