<div class="container">
    <form wire:submit.prevent={{ $idMahasiswa > 0 ? "simpanMahasiswa()" : "tambahMahasiswa()" }}>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <input wire:model.defer="nama" placeholder="Nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" aria-describedby="validationNama">
                    @error('nama')
                    <div id="validationNama" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <input wire:model.defer="nim" placeholder="NIM" type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" aria-describedby="validationNIM">
                    @error('nim')
                    <div id="validationNIM" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-4">
                <button class="btn btn-primary">{{ $idMahasiswa > 0 ? 'Simpan' : 'Tambah' }}</button>
            </div>
        </div>
    </form>
</div>