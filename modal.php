<!-- create modal -->
 
<div class="modal fade" id="modal_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Form create user</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label">name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">email:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" onclick="create_user()">create</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Form edit user</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label">name:</label>
                        <input type="text" class="form-control" id="name_edit">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">email:</label>
                        <input type="email" class="form-control" id="email_edit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" onclick="update_user()">update</button>
                    </div>
            </div>
        </div>
    </div>
</div>