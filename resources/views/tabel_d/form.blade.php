<form method="POST" action="{{ route('d.save', ['id' => $data!=null ? $data->kode_sales : 0]) }}">
    @csrf
    <div class="modal-body">
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Kode Sales </label>
            </div>
            <div class="col-sm-8">
				<input type="text" class="form-control" name="kode_sales" value="{{ $data!=null ? $data->kode_sales : '' }}" {{ $data!=null ? 'disabled required' : '' }}>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Nama Sales </label>
            </div>
            <div class="col-sm-8">
				<input type="text" min="0" class="form-control" name="nama_sales" value="{{ $data!=null ? $data->nama_sales : '' }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
