<div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="javascript:formSubmit('modal_edit')" id="modal_edit" 
        url="{{ route('superadmin.update') }}"
        method="post">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="id_user" value="{{ $data->id_user }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" class="form-control" name="username" placeholder="username" value="{{ $data->username }}" required>
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="text" class="form-control" name="password" placeholder="password" value="{{ $data->password }}" required>
                </div>
                <div class="form-group">
                    <label>ROLE</label>
                    <input type="text" class="form-control"  name="role_id" value="{{ $data->role_id }}" placeholder="role" >
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="formSubmit('modal_edit')" class="btn btn-primary"><i id="msg_modal_edit"></i>  Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>