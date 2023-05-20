<!-- Modal -->
<form method="post" id="formDelete" name="formDelete">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-warning">
                    <h4 class="modal-title" id="deleteModalLabel">WARNING</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <input type="text" name="subject_unique_id" id="subject_unique_id" class="form-control">
                         
                        <p class="text-center">Are your sure you want to delete this data?</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="cancel" class="btn btn-outline-danger" data-bs-dismiss="modal" style="height:35px; font-size:10pt;">No</button>
                    <button type="button" id="delete" class="btn btn-outline-success" style="height:35px; font-size:10pt;">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
