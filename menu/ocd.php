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
print gen_menu($menu);