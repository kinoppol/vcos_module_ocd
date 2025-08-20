<?php

$menu['เอกสารเบิกค่าสอน']=array(
    'timetables'=>array(
        'label'=>'จัดการตารางสอน',
        'bullet'=>'tf-icons bx bx-table',
        'url'=>module_url('ocd','ocd','timetables'),
    ),
    'claim_form'=>array(
        'label'=>'พิมพ์ใบเบิก',
        'bullet'=>'tf-icons bx bx-printer',
        'url'=>module_url('ocd','ocd','claim_form'),
        /*'item'=>array(
                'menu1'=>array(
                'label'=>'เมนูย่อย 1',
                'url'=>module_url('hello','menu1'),
            ),
                'menu2'=>array(
                'label'=>'เมนูย่อย 2',
                'url'=>module_url('hello','menu2'),
            ),
        ),*/
    ),
);
$active_menu=explode(',',$_SESSION['user_type']['active_menu']);
//print_r($active_menu);
if (($key=array_search("ocd_config", $active_menu)) != NULL) 
    $menu['ตั้งค่าการทำงาน']=array(
    'timetables'=>array(
        'label'=>'ข้อมูลสถานศึกษา',
        'bullet'=>'tf-icons bx bx-home',
        'url'=>module_url('ocd','ocd_config','working'),
    ),
    'claim_form'=>array(
        'label'=>'การลงนาม',
        'bullet'=>'tf-icons bx bx-edit',
        'url'=>module_url('ocd','ocd_config','signing'),
    ),
);
print gen_menu($menu);