<form method="POST" action="{{ route('b.save', ['id' => $data!=null ? $data->kode_toko : 0]) }}">
    @csrf
    <div class="modal-body">
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Kode Toko </label>
            </div>
            <div class="col-sm-8">
				<input type="text" class="form-control" name="kode_toko" value="{{ $data!=null ? $data->kode_toko : '' }}" {{ $data!=null ? 'readonly required' : '' }}>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm-4 d-flex align-items-center">
                <label>Nominal Transaksi </label>
            </div>
            <div class="col-sm-8">
				<input type="number" min="0" class="form-control" name="nominal_transaksi" value="{{ $data!=null ? $data->nominal_transaksi : '' }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
