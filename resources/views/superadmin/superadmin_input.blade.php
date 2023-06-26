<div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="javascript:formSubmit('modal_input')" id="modal_input" 
        url="{{ route('superadmin.create') }}"
        method="post">
    <div class="modal-body">
        @csrf
        <div class="row">
        <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <input type="text" name="role_id" class="form-control" value="superadmin" readonly>
                </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="formSubmit('modal_input')" class="btn btn-primary"><i id="msg_modal_input"></i>Tambah</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>