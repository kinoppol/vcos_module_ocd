<?php
helper('time');
$data['title']='จัดการตารางสอนตามรายชื่อครู';

$teacherTable='';
foreach($tids as $t){
  $teacherTable.='<tr>
  <td>'.$teachers[$t['tid']]['name'].' '.$teachers[$t['tid']]['surname'].'</td>
  <td>

    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
            data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item"
                href="#"><i
                    class="bx bx-list-check me-1"></i> ตั้งค่าการนับคาบ</a>
            <a class="dropdown-item"
                href="'.module_api('ocd','ocd_print','timetable').'" target="_blank"><i
                    class="bx bx-table me-1"></i> พิมพ์ตารางสอน ศธ.02</a>
            <a class="dropdown-item"
                href="#"><i
                    class="bx bx-table me-1"></i> พิมพ์ตารางสอนเบิก</a>
        </div>
    </div>
  </td>
  </tr>';
}

$data['content']='
 <div class="row g-6">
    <div class="col-md-4">
        <div class="mb-4">
            <!-- <label for="exampleFormControlSelect1" class="form-label">เลือกภาคเรียน</label> -->
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option selected>1/2568</option> 
                </select>
        </div>
    </div>      
    <div class="col-md-4">
        <div class="mb-4">
            <button type="submit" class="btn btn-primary from-control">ตกลง</button>
        </div>
    </div>
</div>

<div class="table-responsive text-nowrap">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>ครู</th>
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