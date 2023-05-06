<!-- Modal -->
<form method="post" id="formAdd" name="formAdd">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">NEW SUBJECT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="subject_id" id="subject_id" class="form-control" placeholder="Subject ID" aria-label="Subject ID" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="subject_code" id="subject_code" class="form-control" placeholder="Subject Code" aria-label="Subject Code" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder="Subject name" aria-label="Subject name" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="semester" id="semester" class="form-control" placeholder="Sem" style="height:35px; font-size:10pt;" min="1" max="3" required>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="curriculum" id="curriculum" class="form-control" placeholder="Curr" style="height:35px; font-size:10pt;" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="year_level" id="year_level" class="form-control" placeholder="Yr Lvl" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="unit_lec" id="unit_lec" class="form-control" placeholder="Lec" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="unit_lab" id="unit_lab" class="form-control" placeholder="Lab" style="height:35px; font-size:10pt;" min="1" max="4" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-danger" data-bs-dismiss="modal" style="height:35px; font-size:10pt;">Close</button>
                    <button type="button" id="save" class="btn" style="height:35px; font-size:10pt; color:white; background-color:#107869">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
