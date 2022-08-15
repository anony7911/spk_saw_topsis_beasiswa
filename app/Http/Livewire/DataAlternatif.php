<?php

namespace App\Http\Livewire;

use App\Models\Alternatif;
use Livewire\Component;
use Livewire\WithPagination;

class DataAlternatif extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $updatesQueryString = ['search'];

    protected $alternatifs;
    public $nama_lengkap, $nis, $kelas, $pekerjaan_ortu, $penghasilan_ortu, $jumlah_tanggungan, $status_anak, $pemegang_kks, $pemegang_pkh, $pemegang_sktm,
        $alternatifId;

    public function resetInput()
    {
        $this->nama_lengkap = '';
        $this->nis = '';
        $this->kelas = '';
        $this->pekerjaan_ortu = '';
        $this->penghasilan_ortu = '';
        $this->jumlah_tanggungan = '';
        $this->status_anak = '';
        $this->pemegang_kks = '';
        $this->pemegang_pkh = '';
        $this->pemegang_sktm = '';
    }
    public function render()
    {
        $this->alternatifs = Alternatif::where('nama_lengkap', 'like', '%' . $this->search . '%')
            ->orWhere('nis', 'like', '%' . $this->search . '%')
            ->orWhere('kelas', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-alternatif', [
            'alternatifs' => $this->alternatifs,
        ]);
    }

    public function alternatifId($id)
    {
        $this->alternatifId = $id;

        $alternatif = Alternatif::findOrFail($id);

        $this->nama_lengkap = $alternatif->nama_lengkap;
        $this->nis = $alternatif->nis;
        $this->kelas = $alternatif->kelas;
        $this->pekerjaan_ortu = $alternatif->pekerjaan_ortu;
        $this->penghasilan_ortu = $alternatif->penghasilan_ortu;
        $this->jumlah_tanggungan = $alternatif->jumlah_tanggungan;
        $this->status_anak = $alternatif->status_anak;
        $this->pemegang_kks = $alternatif->pemegang_kks;
        $this->pemegang_pkh = $alternatif->pemegang_pkh;
        $this->pemegang_sktm = $alternatif->pemegang_sktm;
    }

    public function store()
    {
        $this->validate([
            'nama_lengkap' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'pekerjaan_ortu' => 'required',
            'penghasilan_ortu' => 'required',
            'jumlah_tanggungan' => 'required',
            'status_anak' => 'required',
            'pemegang_kks' => 'required',
            'pemegang_pkh' => 'required',
            'pemegang_sktm' => 'required',
        ]);
        Alternatif::create([
            'nama_lengkap' => $this->nama_lengkap,
            'nis' => $this->nis,
            'kelas' => $this->kelas,
            'pekerjaan_ortu' => $this->pekerjaan_ortu,
            'penghasilan_ortu' => $this->penghasilan_ortu,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'status_anak' => $this->status_anak,
            'pemegang_kks' => $this->pemegang_kks,
            'pemegang_pkh' => $this->pemegang_pkh,
            'pemegang_sktm' => $this->pemegang_sktm,
        ]);
        $this->resetInput();
        session()->flash('success', 'Data Alternatif berhasil ditambahkan');

    }

    public function update()
    {
        $alternatif = Alternatif::findOrFail($this->alternatifId);
        $alternatif->update([
            'nama_lengkap' => $this->nama_lengkap,
            'nis' => $this->nis,
            'kelas' => $this->kelas,
            'pekerjaan_ortu' => $this->pekerjaan_ortu,
            'penghasilan_ortu' => $this->penghasilan_ortu,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'status_anak' => $this->status_anak,
            'pemegang_kks' => $this->pemegang_kks,
            'pemegang_pkh' => $this->pemegang_pkh,
            'pemegang_sktm' => $this->pemegang_sktm,
        ]);
        $this->resetInput();
        session()->flash('success', 'Data Alternatif berhasil diubah');
    }

    public function edit($id)
    {
    }

    public function deleteAlternatif($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        session()->flash('error', 'Data Alternatif berhasil dihapus');
    }
}
