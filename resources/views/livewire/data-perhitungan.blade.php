<div>
    @php
    $i = 0;
    $j = 2;
    $k = 2;
    $l = 2;
    $m = 2;
    $n = 2;
    $o = 2;
    $p = 2;
    $yj = 2;
    $yk = 2;
    $yl = 2;
    $ym = 2;
    $yn = 2;
    $yo = 2;
    $yp = 2;
    $jp = 2;
    $jn = 2;
    @endphp
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Matriks Ternormalisasi R
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pekerjaan Orang Tua</th>
                                <th>Penghasilan Orangtua</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Status Anak</th>
                                <th>Pemegang KKS</th>
                                <th>Pemegang PKH</th>
                                <th>Pemegang SKTM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $pekerjaan_ortu[$j++] }}</td>
                                <td>{{ $penghasilan_ortu[$k++] }}</td>
                                <td>{{ $jumlah_tanggungan[$l++] }}</td>
                                <td>{{ $status_anak[$m++] }}</td>
                                <td>{{ $pemegang_kks[$n++] }}</td>
                                <td>{{ $pemegang_pkh[$o++] }}</td>
                                <td>{{ $pemegang_sktm[$p++] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Matriks Terbobot Y
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pekerjaan Orang Tua</th>
                                <th>Penghasilan Orangtua</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Status Anak</th>
                                <th>Pemegang KKS</th>
                                <th>Pemegang PKH</th>
                                <th>Pemegang SKTM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $y_pekerjaan_ortu[$yj++] }}</td>
                                <td>{{ $y_penghasilan_ortu[$yk++] }}</td>
                                <td>{{ $y_jumlah_tanggungan[$yl++] }}</td>
                                <td>{{ $y_status_anak[$ym++] }}</td>
                                <td>{{ $y_pemegang_kks[$yn++] }}</td>
                                <td>{{ $y_pemegang_pkh[$yo++] }}</td>
                                <td>{{ $y_pemegang_sktm[$yp++] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Solusi Ideal Positif & Negatif
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Pekerjaan Orang Tua</th>
                                <th>Penghasilan Orangtua</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Status Anak</th>
                                <th>Pemegang KKS</th>
                                <th>Pemegang PKH</th>
                                <th>Pemegang SKTM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Positif</td>
                                <td>{{ $p_pekerjaan_ortu }}</td>
                                <td>{{ $p_penghasilan_ortu }}</td>
                                <td>{{ $p_jumlah_tanggungan }}</td>
                                <td>{{ $p_status_anak }}</td>
                                <td>{{ $p_pemegang_kks }}</td>
                                <td>{{ $p_pemegang_pkh }}</td>
                                <td>{{ $p_pemegang_sktm}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Negatif</td>
                                <td>{{ $n_pekerjaan_ortu }}</td>
                                <td>{{ $n_penghasilan_ortu }}</td>
                                <td>{{ $n_jumlah_tanggungan }}</td>
                                <td>{{ $n_status_anak }}</td>
                                <td>{{ $n_pemegang_kks }}</td>
                                <td>{{ $n_pemegang_pkh }}</td>
                                <td>{{ $n_pemegang_sktm}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Jarak Solusi Positif & Negatif
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Positif</th>
                                <th>Negatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $jarak_positif[$jp++] }} </td>
                                <td>{{ $jarak_negatif[$jn++] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Nilai Preferensi
            </h3>
        </div>
        <div class="card-body text-center">
            <div class="row mt-1">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nilai Preferensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alternatif->nama_lengkap }}</td>
                                <td>{{ $preferensi[$i++] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
<<<<<<< HEAD
            <button type="submit" wire:click.prevent="store()" class="btn btn-primary btn-block mb-4 mt-4">
                Simpan Hasil Perhitungan
            </button>
=======
            {{-- input jumlah layak --}}
            <div class="row mt-1">
                <div class="col-md-12 bg-secondary">
                    <div class="form-group text-left">
                        <label class="text-lg" for="jumlah_layak">Masukkan Jumlah Kuota</label>
                        <input type="number" wire:model='jumlah_layak' class="form-control @error('jumlah_layak') is-invalid @enderror" value="{{ old('jumlah_layak') }}">
                        @error('jumlah_layak')
                        <div class="invalid-feedback text-white">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" wire:click.prevent="store()" class="btn btn-primary btn-block mb-4 mt-4">
                    Simpan Hasil Perhitungan
                </button>
            </div>
>>>>>>> d497433 (aa)
        </div>
    </div>
</div>
