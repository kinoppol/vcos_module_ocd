<?php
helper('view/card');
helper('view/form');

$data['title']='สืบค้นใบเบิกค่าสอน';
$data['content']=' 
    <form action="'.module_url('ocd','ocd','claim_form').'" method="post">
    <div class="row g-6">
        <div class="col-md-4">
            <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">ภาคเรียน</label>
                <!-- <label for="exampleFormControlSelect1" class="form-label">เลือกภาคเรียน</label> -->
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="semester">
                        '.gen_option($semesters,$semester).'
                    </select>
            </div>
        </div>      
        <div class="col-md-4">
            <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">แผนก</label>
                <label for="exampleFormControlSelect1" class="form-label">เลือกแผนก</label>
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="semester">
                        '.gen_option($semesters,$semester).'
                    </select>
            </div>
        </div>      
        <div class="col-md-4">
            <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">ชื่อผู้เบิก</label>
            <div class="form">
                                <input type="text" class="form-control" id="floatingInput" placeholder="สมชาย"
                                    name="drawer"
                                    value="'.(empty($_POST['drawer'])?'':$_POST['drawer']).'"/>
                                <div id="floatingInputHelp" class="form-text">

                                </div>
                            </div>
        </div>      
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary from-control">ตกลง</button>
            </div>
        </div>
        
    </form>
';
print card($data);
?>