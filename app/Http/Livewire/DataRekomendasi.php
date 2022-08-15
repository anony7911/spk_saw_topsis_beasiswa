<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rekomendasi;
use Livewire\WithPagination;

class DataRekomendasi extends Component
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

    protected $rekomendasis;
    public $alternatif_id, $nilai_preferensi, $keterangan, $rekomendasiId;

    public function render()
    {
        $this->rekomendasis = Rekomendasi::join('alternatifs', 'rekomendasis.alternatif_id', '=', 'alternatifs.id')
            ->select('rekomendasis.*', 'alternatifs.nama_lengkap', 'alternatifs.nis', 'alternatifs.kelas')
            ->where('alternatifs.nama_lengkap', 'like', '%' . $this->search . '%')
            ->orderBy('nilai_preferensi', 'desc')
            ->paginate($this->perPage);
        return view('livewire.data-rekomendasi',[
            'rekomendasis' => $this->rekomendasis,
        ]);
    }

    public function resetRekomendasi(){
        Rekomendasi::truncate();
        session()->flash('error', 'Data Rekomendasi Berhasil Dihapus');
    }
}
