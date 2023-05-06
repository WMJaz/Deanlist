<!-- Modal -->
<form method="post" id="formEdit" name="formEdit">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">EDIT SUBJECT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <input type="text" name="subject_unique_id" id="subject_unique_id" class="form-control">

                        <div class="col-md-6">
                            <label for="subject_id">Subject ID</label>
                            <input type="text" name="subject_id" id="subject_id" class="form-control" placeholder="Subject ID" aria-label="Subject ID" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-6">
                            <label for="subject_code">Subject Code</label>
                            <input type="text" name="subject_code" id="subject_code" class="form-control" placeholder="Subject Code" aria-label="Subject Code" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-12">
                            <label for="subject_name">Subject Description</label>
                            <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder="Subject name" aria-label="Subject name" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-2">
                            <label for="semester">Sem</label>
                            <input type="number" name="semester" id="semester" class="form-control" placeholder="Sem" style="height:35px; font-size:10pt;" min="1" max="3" required>
                        </div>

                        <div class="col-md-2">
                            <label for="curriculum">Curr</label>
                            <input type="text" name="curriculum" id="curriculum" class="form-control" placeholder="Curr" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-2">
                            <label for="year_level">Yr Lvl</label>
                            <input type="number" name="year_level" id="year_level" class="form-control" placeholder="Yr Lvl" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>

                        <div class="col-md-2">
                            <label for="unit_lec">Lec</label>
                            <input type="number" name="unit_lec" id="unit_lec" class="form-control" placeholder="Lec" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>

                        <div class="col-md-2">
                            <label for="unit_lab">Lab</label>
                            <input type="number" name="unit_lab" id="unit_lab" class="form-control" placeholder="Lab" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>

                        <div class="col-md-2">
                            <label for="pre_req">Prereq</label>
                            <input type="text" name="pre_req" id="pre_req" class="form-control" placeholder="Pre Req" style="height:35px; font-size:10pt;" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-danger" data-bs-dismiss="modal" style="height:35px; font-size:10pt;">Close</button>
                    <button type="button" id="update" class="btn" style="height:35px; font-size:10pt; color:white; background-color:#107869">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
