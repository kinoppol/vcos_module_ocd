<?php
$data['title']='ตั้งค่าการเบิก';

$teacherTable='';
foreach($tids as $t){
  $teacherTable.='<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>
 X / -
    
  </td>
  </tr>';
}

$data['content']='
 <div class="row g-6">
    <form action="'.module_url('ocd','ocd','timetables').'" method="post">
        <div class="col-md-4">
            <div class="mb-4">
                <!-- <label for="exampleFormControlSelect1" class="form-label">เลือกภาคเรียน</label> -->
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="semester">
                        '.gen_option($semesters,$semester).'
                    </select>
            </div>
        </div>      
        <div class="col-md-4">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary from-control">ตกลง</button>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive text-nowrap">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>รหัสวิชา</th>
                                  <th>ชื่อวิชา</th>
                                  <th>วันเวลา</th>
                                  <th>กลุ่มผู้เรียน</th>
                                  <th>ดำเนินการ</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                          '.$teacherTable.'                         
                          </tbody>
                        </table>
                        </div>

';
helper('view/card');
print card($data);