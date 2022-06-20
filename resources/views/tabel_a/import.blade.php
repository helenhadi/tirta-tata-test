<form method="POST" enctype="multipart/form-data" action="{{route('a.import')}}">
    @csrf
    <div class="modal-body">
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Masukkan File Excel (.xlsx) <span class="text-danger">*</span></label>
            </div>
            <div class="col-sm-8">
                <input type="file" name="file" class="form-control" accept=".xlsx" required>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center"></div>
            <div class="col-sm-8">
                <label class="form-control-label text-danger mt-2">*Format: xlsx</label><br>
                <label class="form-control-label text-danger">*Klik di <a href="{{ asset('TableAImport.xlsx') }}" class="text-info" target="_blank" download>sini</a> untuk melihat contoh file</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-sm btn-success">Import</button>
    </div>
</form>
