<?php
$data['title']='ตั้งค่าตำแหน่ง';

$teachTable='';
//print_r($timetables);
foreach($timetables as $t){
    if(empty($t['timeTableID'])||empty($t['timeTableSubID'])){
        continue;
    }
    $id=$t['time'].'-'.$t['timeTableID'].'-'.$t['timeTableSubID'].'-'.$t['subject_code'];
  $teachTable.='<tr>
  <td>'.$t['subject_code'].'</td>
  <td>'.$t['subject_name'].'</td>
  <td>'.$t['day_of_week'].' '.$t['time_range'].'</td>
  <td>'.$t['student_group_id'].'</td>
  <td>
    <div class="col-md p6">
        <div class="form-check form-check-inline mt-4">
            <input name="count_status['.$id.']" class="form-check-input" type="radio" value="in"/>
            <label class="form-check-label" for="disabledRadio1"> ใน </label>
        </div>
        
        <div class="form-check form-check-inline mt-4">
            <input name="count_status['.$id.']" class="form-check-input" type="radio" value="out"/>
            <label class="form-check-label" for="disabledRadio1"> นอก </label>
        </div>
        
        <div class="form-check form-check-inline mt-4">
            <input name="count_status['.$id.']" class="form-check-input" type="radio" value="not"/>
            <label class="form-check-label" for="disabledRadio1"> ไม่คิด </label>
        </div>
    </div>
  </td>
  </tr>';
}

$data['content']='
<!--
 <div class="row g-6">
    <form action="'.module_url('ocd','ocd','timetables').'" method="post">
        <div class="col-md-6">
            <div class="mb-4">
                <label for="exampleFormControlSelect1" class="form-label">วุฒิการศึกษา</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="semester">
                        '.gen_option($semesters,$semester).'
                    </select>
            </div>
        </div>      
        <div class="col-md-6">
            <div class="mb-4">
                <label for="exampleFormControlSelect1" class="form-label">หน้าที่พิเศษ</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="semester">
                        '.gen_option($semesters,$semester).'
                    </select>
            </div>
        </div>   
        <div class="col-md-6">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary from-control">บันทึก</button>
            </div>
        </div>
    </form>
</div>
-->
<div class="table-responsive text-nowrap">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>รหัสวิชา</th>
                                  <th>ชื่อวิชา</th>
                                  <th>วันเวลา</th>
                                  <th>กลุ่มผู้เรียน</th>
                                  <th>กำหนดค่าการเบิก</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                          '.$teachTable.'                         
                          </tbody>
                        </table>
                        </div>

';
helper('view/card');
print card($data);