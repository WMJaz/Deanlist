<!-- Modal -->
<form method="post" id="formAdd" name="formAdd">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">NEW ACCOUNT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" aria-label="First name" style="height:35px; font-size:10pt;">
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" aria-label="Last name" style="height:35px; font-size:10pt;">
                        </div>

                        <div class="col-12">
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email"  id="inputEmail4" style="height:35px; font-size:10pt;">
                        </div>

                        <div class="col-12">
                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Passworrd" id="inputPassword4" style="height:35px; font-size:10pt;">
                        </div>

                        <div class="col-12">
                            <select name="user_type" id="user_type" class="form-select" aria-label="Default select example" style="height:35px; font-size:10pt;">
                                <option selected>Open this select menu</option>
                                <option value="admin">Admin</option>
                                <option value="adviser">Adviser</option>
                                <option value="student">Student</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <select name="curriculum" id="curriculum" class="form-select" aria-label="Default select example" style="height:35px; font-size:10pt;">
                                <option selected>Open this select menu</option>
                                <option value="BSCS">Computer Science</option>
                                <option value="BSIT">Information Technology</option>
                            </select>
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
