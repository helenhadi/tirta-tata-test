<form method="POST" action="{{ route('a.save', ['id' => $data!=null ? $data->kode_baru : 0]) }}">
    @csrf
    <div class="modal-body">
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Kode Baru </label>
            </div>
            <div class="col-sm-8">
				<input type="text" class="form-control" name="kode_baru" value="{{ $data!=null ? $data->kode_baru : '' }}" {{ $data!=null ? 'readonly required' : '' }}>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Kode Lama </label>
            </div>
            <div class="col-sm-8">
				<input type="text" class="form-control" name="kode_lama" value="{{ $data!=null ? $data->kode_lama : '' }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
