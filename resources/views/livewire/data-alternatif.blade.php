<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalTambah"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Data Alternatif</button>
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts._alert')
                </div>
                <div class="col-md-6 form-inline mb-2 mt-2">
                    Per Page: &nbsp;
                    <select wire:model="perPage" class="form-control">
                        <option>2</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search...">
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Pekerjaan Orangtua</th>
                                <th>Penghasilan Orangtua</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Status Anak</th>
                                <th>Pemegang KKS</th>
                                <th>Pemegang PKH</th>
                                <th>Pemegang SKTM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nis }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $alternatif->kelas }}</td>
                                <td>{{ $alternatif->pekerjaan_ortu }}</td>
                                <td>{{ $alternatif->penghasilan_ortu }}</td>
                                <td>{{ $alternatif->jumlah_tanggungan }}</td>
                                <td>{{ $alternatif->status_anak }}</td>
                                <td>{{ $alternatif->pemegang_kks }}</td>
                                <td>{{ $alternatif->pemegang_pkh }}</td>
                                <td>{{ $alternatif->pemegang_sktm }}</td>
                                <td>
                                    <button wire:click="alternatifId({{ $alternatif->id }})" class="btn btn-sm btn-warning m-1" data-toggle="modal" data-target="#modalEdit">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                    <!-- <button wire:click="deleteAlternatif({{ $alternatif->id }})" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>NIS</label>
                        <input wire:model="nis" type="number" class="form-control @error('nis') is-invalid @enderror">
                        @error('nis')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Lengkap</label>
                        <input wire:model="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror">
                        @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Kelas</label>
                        <input wire:model="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror">
                        @error('kelas')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pekerjaan Orangtua</label>
                        <select class="form-control" wire:model="pekerjaan_ortu">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="1">Pegawai Negeri Sipil (PNS)</option>
                            <option value="2">Wiraswasta</option>
                            <option value="3">Pedagang</option>
                            <option value="4">Buruh</option>
                            <option value="5">Petani/Nelayan</option>
                        </select>
                        @error('pekerjaan_ortu')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Penghasilan Orangtua</label>
                        <select class="form-control" wire:model="penghasilan_ortu">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Kurang dari Rp. 500.000</option>
                            <option value="4">Rp. 500.000 s/d Rp. 1.500.000</option>
                            <option value="3">Rp. 1.500.000 s/d Rp. 2.500.000</option>
                            <option value="2">Rp. 2.500.000 s/d Rp. 3.000.000</option>
                            <option value="1">Lebih dari Rp. 3.000.000</option>
                        </select>
                        @error('penghasilan_ortu')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Jumlah Tanggungan Anak</label>
                        <select class="form-control" wire:model="jumlah_tanggungan">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3 Orang</option>
                            <option value="4">4 Orang</option>
                            <option value="5">Lebih dari 5 Orang</option>
                        </select>
                        @error('jumlah_tanggungan')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Status Anak</label>
                        <select class="form-control" wire:model="status_anak">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="2">Tidak yatim piatu</option>
                            <option value="3">Yatim</option>
                            <option value="4">Piatu</option>
                            <option value="5">Yatim Piatu</option>
                        </select>
                        @error('status_anak')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang KKS</label>
                        <select class="form-control" wire:model="pemegang_kks">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_kks')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang PKH</label>
                        <select class="form-control" wire:model="pemegang_pkh">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_pkh')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang SKTM</label>
                        <select class="form-control" wire:model="pemegang_sktm">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_sktm')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" data-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="store()" class="btn btn-info close-modal" data-dismiss="modal">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>NIS</label>
                        <input wire:model="nis" type="number" class="form-control @error('nis') is-invalid @enderror">
                        @error('nis')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Lengkap</label>
                        <input wire:model="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror">
                        @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Kelas</label>
                        <input wire:model="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror">
                        @error('kelas')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pekerjaan Orangtua</label>
                        <select class="form-control" wire:model="pekerjaan_ortu">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="1">Pegawai Negeri Sipil (PNS)</option>
                            <option value="2">Wiraswasta</option>
                            <option value="3">Pedagang</option>
                            <option value="4">Buruh</option>
                            <option value="5">Petani/Nelayan</option>
                        </select>
                        @error('pekerjaan_ortu')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Penghasilan Orangtua</label>
                        <select class="form-control" wire:model="penghasilan_ortu">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Kurang dari Rp. 500.000</option>
                            <option value="4">Rp. 500.000 s/d Rp. 1.500.000</option>
                            <option value="3">Rp. 1.500.000 s/d Rp. 2.500.000</option>
                            <option value="2">Rp. 2.500.000 s/d Rp. 3.000.000</option>
                            <option value="1">Lebih dari Rp. 3.000.000</option>
                        </select>
                        @error('penghasilan_ortu')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Jumlah Tanggungan Anak</label>
                        <select class="form-control" wire:model="jumlah_tanggungan">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3 Orang</option>
                            <option value="4">4 Orang</option>
                            <option value="5">Lebih dari 5 Orang</option>
                        </select>
                        @error('jumlah_tanggungan')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Status Anak</label>
                        <select class="form-control" wire:model="status_anak">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="2">Tidak yatim piatu</option>
                            <option value="3">Yatim</option>
                            <option value="4">Piatu</option>
                            <option value="5">Yatim Piatu</option>
                        </select>
                        @error('status_anak')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang KKS</label>
                        <select class="form-control" wire:model="pemegang_kks">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_kks')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang PKH</label>
                        <select class="form-control" wire:model="pemegang_pkh">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_pkh')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Pemegang SKTM</label>
                        <select class="form-control" wire:model="pemegang_sktm">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="5">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                        @error('pemegang_sktm')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" data-dismiss="modal">Close</button>
                    <button type="submit" wire:click.prevent="update()" class="btn btn-info close-modal" data-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>

</div>
