<?php
helper('print');
$module->helper('subject');
$module->helper('timetable');
//print_r($timetableSlot);


$subject_list=array_values($subject_list);


//print_r($week_slot);

$cells='';


foreach($week_slot as $day=>$cell_data){
    
$daycell='';
    $jump=0;
    foreach($cell_data as $ck=>$cd){
        if($jump>0){
            //print $jump;
            $jump--;
            continue;
        }else{
            if($cd['time_total']>1)$jump=$cd['time_total']-1;
            if(count($cd)>0){
                $daycell.=cell($cd);
            }else{
                $daycell.=empty_cell();
            }
        }
    }

    $cells.=' <tr>
                <td height="50" align="center" valign="middle" style="border-left: 1px solid #000; border-bottom: 1px solid #000; border-right: 1px solid #000;   font-size:12px; font-weight: bold;">'.$day.'</td>
                '.$daycell.'
            </tr>';
}


$sum_total_time=0;
if(!count($subject_list)){

}else{
    $subject_row='';
    for($i=0;$i<9;$i++){
        if(!empty($subject_list[$i])){
            $sum_total_time+=$subject_list[$i]['time_total'];
            $subject_row.='<tr>
            <td style="border:1px solid #000; font-size:14px; text-align:center">'.sj_code($subject_list[$i]['subject_code']).'</td>
            <td style="border:1px solid #000; font-size:14px; text-align:left">'.$subject_list[$i]['subject_name'].'</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">'.$subject_list[$i]['time_total'].'</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td></tr>';
        }else{
            $subject_row.='<tr>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
            <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td></tr>';
        }
    }
}

$data=array(
    'title'=>'ตารางสอน',
    'content'=>'
    <style>
        td{
        font-size:14px;
        }
    </style>
    <span id="htmlCode">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width: 1024px; margin-top: 15px; margin-bottom: 3px;"><tr>
        <td width="24%" style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; font-weight: bold; font-size:16px" rowspan="11">
         <div align="center">
        <img src="'.site_url('images/logo_VEC.png',true).'" width="80"><br>
        วิทยาลัยอาชีวศึกษาร้อยเอ็ด
        </div>
        <br>
         <span style="text-align: left; display: inline-block; width: 100%;">
        &nbsp;<b>ภาคเรียน</b> '.$semester.'<br>
        &nbsp;<b>ผู้สอน</b> '.$teacher['name'].' '.$teacher['surname'].'<br>
        &nbsp;<b>วุฒิการศึกษา</b><br>
        &nbsp;<b>แผนกวิชา</b><br>
        &nbsp;<b>หน้าที่พิเศษ</b><br>
        &nbsp;
        </td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="8%"><b>รหัสวิชา</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="22%"><b>ชื่อรายวิชา</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ท.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ป.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>น.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ช.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="8%"><b>รหัสวิชา</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="22%"><b>ชื่อรายวิชา</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ท.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ป.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>น.</b></td>
        <td style="border:1px solid #000; font-size:14px; text-align:center" width="2%"><b>ช.</b></td>
        </td>
    </td></tr>
    '.$subject_row.'
    <tr>
    <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
    <td style="border:1px solid #000; font-size:14px; text-align:right">&nbsp;รวม&nbsp;</td>
    <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
    <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
    <td style="border:1px solid #000; font-size:14px; text-align:center">&nbsp;</td>
    <td style="border:1px solid #000; font-size:14px; text-align:center">'.$sum_total_time.'</td>
    <td style="border:1px solid #000; font-size:14px; text-align:center" colspan="6">&nbsp;</td></tr>
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width:" 1024px";="">
        <tbody>
            <tr>
                <td width="68" height="50" align="center" valign="middle" style="border:1px solid #000;  font-size:14px;">เวลา</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">07:40 - 08:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; font-weight: bold;">08:00 - 09:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">09:00 - 10:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">10:00 - 11:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">11:00 - 12:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">12:00 - 13:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">13:00 - 14:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">14:00 - 15:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">15:00 - 16:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">16:00 - 17:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">17:00 - 18:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">18:00 - 19:00</td>
                <td width="68" height="50" align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000; border-top: 1px solid #000; ">19:00 - 20:00</td>
            </tr>
            <tr>
                <td width="68" height="30" align="center" valign="middle" style="border:1px solid #000;  font-size:14px;">วัน/คาบ</td>
                <td rowspan="6" align="center" valign="middle" style="border-right: 1px solid #000; border-bottom: 1px solid #000; "><div style=" -ms-writing-mode: tb-rl;-webkit-writing-mode:vertical-rl;writing-mode: vertical-rl;transform:rotate(180deg);white-space: nowrap;">กิจกรรมหน้าเสาธง</div></td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">1</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">2</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">3</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">4</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">5</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">6</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">7</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">8</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">9</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">10</td
                ><td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">11</td>
                <td align="center" valign="middle" style=" border-right: 1px solid #000; border-bottom: 1px solid #000;  ">12</td>
            </tr>
            '.$cells.'
        </tbody>
    </table>
    </span>
    <br>
    <table width="100%">
        <tr>
            <td width="25%" style="text-align:center">
            ลงชื่อ......................................................<br>
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </td>
            <td width="25%" style="text-align:center">
            ลงชื่อ......................................................<br>
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </td>
            <td width="25%" style="text-align:center">
            ลงชื่อ......................................................<br>
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </td>
            <td width="25%" style="text-align:center">
            ลงชื่อ......................................................<br>
            (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </td>
        </tr>
    </table>
    '
);
print landscape_print($data);