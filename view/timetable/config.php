<?php
$data['title']='ภาคเรียน '.$semester;
$module->helper('radio');
$teachTable='';
//print_r($timeSlot);
foreach($timeSlot as $t){
    // if(empty($t['timeTableID'])||empty($t['timeTableSubID'])){
    //     continue;
    // }
    $id=$semester.'-'.$t['teacher_id'].'-'.$t['day_of_week_no'].'-'.$t['time_range'];

    $key=array(
        'semester'=>$semester,
        'teacher_id'=>$t['teacher_id'],
        'day_of_week_no'=>$t['day_of_week_no'],
        'time_range'=>$t['time_range'],
    );
    $ocd_tc=$ocd_config_model->getConfig($key);
    $ocd_tc=$ocd_tc[0];
    //print_r($ocd_tc);
    $def=empty($ocd_tc['status'])?'in':$ocd_tc['status'];

    $radio_data=array(
        'name'=>'timetable_status['.$id.']',
        'items'=>array(
            'in'=>'ใน',
            'out'=>'นอก',
            'not'=>'ไม่นับ'
        ),
        'def'=>$def,
    );

  $teachTable.='<tr>
  <td>'.$t['day_of_week'].'</td>
  <td>'.$t['time_range'].'</td>
  <td>'.$t['subject_code'].'</td>
  <td>'.$t['subject_name'].'</td>
  <td>'.$t['student_group_id'].'</td>
  <td>
    <div class="col-md p6">
        '.gen_radio($radio_data).'
    </div>
  </td>
  </tr>';
}
//print_r($teacher);
$data['content']='
<p>ตั้งค่าการเบิกของ '.$teacher['name'].' '.$teacher['surname'].'</p>
<div class="table-responsive text-nowrap">

                        <form action="'.module_api('ocd','ocd','saveConfig').'/semester/'.base64_encode($semester).'/tid/'.$teacher['citizen_id'].'" method="post">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>วัน</th>
                                  <th>เวลา</th>
                                  <th>รหัสวิชา</th>
                                  <th>ชื่อวิชา</th>
                                  <th>กลุ่มผู้เรียน</th>
                                  <th>กำหนดค่าภาระงาน</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                          '.$teachTable.'                         
                          </tbody>
                        </table>
                        <hr>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <button type="submit" class="btn btn-primary from-control">บันทึก</button>
                                    <button type="reset" class="btn btn-danger from-control">ล้างค่า</button>
                                </div>
                            </div>
                        </form>
                        </div>

';
helper('view/card');
print card($data);