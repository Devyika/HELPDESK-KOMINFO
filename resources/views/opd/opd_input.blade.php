<div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <form action="javascript:formSubmit('modal_input')" id="modal_input" 
        url="{{ route('opd.create') }}"
        method="post">
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" class="form-control" name="username" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label>Asal Instansi</label>
                    <input type="text" class="form-control"  name="asal" placeholder="asal">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="formSubmit('modal_input')" class="btn btn-primary"><i id="msg_modal_input"></i>  Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </form>