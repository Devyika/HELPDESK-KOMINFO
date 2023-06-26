</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input Gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('pendaftarans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row p-4 ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NAMA</strong>
                <input type="text" name="namawebsite" class="form-control" placeholder="nama website/aplikasi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
                <strong>LOGO</strong>
                <input type="file" name="image" class="form-control" placeholder="Logo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ALAMAT URL</strong>
                <input type="text" name="url" class="form-control" placeholder="alamat url ">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TOKEN</strong>
                <input type="text" name="token" class="form-control" placeholder="token google API">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>STATUS</strong><br>
                <input type="radio" name="status" value="Publish" id="status" selected> Publish
                <input type="radio" name="status"  value="Private" id="status" selected> Private
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
</div>
