<div>
    <div class="card">
<<<<<<< HEAD
        <div class="card-header">
            <h3 class="card-title"><button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalTambah"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Data Kriteria</button>
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
=======
        <!--<div class="card-header">-->
        <!--    <h3 class="card-title"><button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalTambah"> <i class="fa fa-plus-circle" aria-hidden="true"></i>-->
        <!--            Data Kriteria</button>-->
        <!--    </h3>-->
        <!--</div>-->
        <div class="card-body text-center">
            <!--<div class="row">-->
            <!--    <div class="col-md-12">-->
            <!--        @include('layouts._alert')-->
            <!--    </div>-->
            <!--    <div class="col-md-6 form-inline mb-2 mt-2">-->
            <!--        Per Page: &nbsp;-->
            <!--        <select wire:model="perPage" class="form-control">-->
            <!--            <option>2</option>-->
            <!--            <option>5</option>-->
            <!--            <option>10</option>-->
            <!--            <option>15</option>-->
            <!--            <option>25</option>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search...">-->
            <!--    </div>-->
            <!--</div>-->
>>>>>>> d497433 (aa)
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Atribut Kriteria</th>
                                <th>Bobot Kriteria</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $kriteria)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kriteria->nama_kriteria }}</td>
                                <td>{{ $kriteria->atribut_kriteria }}</td>
                                <td>{{ $kriteria->bobot_kriteria }}</td>
                                <td>
                                    <button wire:click="kriteriaId({{ $kriteria->id }})" class="btn btn-sm btn-warning m-1" data-toggle="modal" data-target="#modalEdit">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
<<<<<<< HEAD
                                    <button wire:click="deleteKriteria({{ $kriteria->id }})" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
=======
                                    <!--<button wire:click="deleteKriteria({{ $kriteria->id }})" class="btn btn-sm btn-danger">-->
                                    <!--    <i class="fa fa-trash" aria-hidden="true"></i>-->
                                    <!--</button>-->
>>>>>>> d497433 (aa)
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Nama Kriteria</label>
                        <input wire:model="nama_kriteria" type="text" class="form-control @error('nama_kriteria') is-invalid @enderror">
                        @error('nama_kriteria')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Atribut Kriteria</label>
                        <select wire:model="atribut_kriteria" class="form-control @error('atribut_kriteria') is-invalid @enderror">
                            <option value="" hidden>-- Pilih --</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                        @error('atribut_kriteria')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Bobot Kriteria</label>
                        <input wire:model="bobot_kriteria" type="number" class="form-control @error('bobot_kriteria') is-invalid @enderror">
                        @error('bobot_kriteria')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" data-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="store()" class="btn btn-info close-modal" data-dismiss="modal">Tambah</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div wire:ignore.self class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Nama Kriteria</label>
                        <input wire:model="nama_kriteria" type="text" class="form-control @error('nama_kriteria') is-invalid @enderror">
                        @error('nama_kriteria')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Atribut Kriteria</label>
                        <select wire:model="atribut_kriteria" class="form-control @error('atribut_kriteria') is-invalid @enderror">
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Bobot Kriteria</label>
                        <input wire:model="bobot_kriteria" type="number" class="form-control @error('bobot_kriteria') is-invalid @enderror">
                        @error('bobot_kriteria')<div class="invalid-feedback">{{ $message }}
                        </div>@enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal" data-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="update()" class="btn btn-info close-modal" data-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
