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
                href="#"><i
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