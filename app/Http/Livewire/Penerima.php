<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rekomendasi;
use Livewire\WithPagination;

class Penerima extends Component
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

    protected $penerimas;
    public function render()
    {
        $this->penerimas = Rekomendasi::join('alternatifs', 'rekomendasis.alternatif_id', '=', 'alternatifs.id')
            ->select('rekomendasis.*', 'alternatifs.nama_lengkap', 'alternatifs.nis', 'alternatifs.kelas')
            ->where('alternatifs.nama_lengkap', 'like', '%' . $this->search . '%')
            ->orderBy('nilai_preferensi', 'desc')
            ->onlyTrashed()
            ->paginate($this->perPage);
        return view('livewire.penerima', [
            'penerimas' => $this->penerimas,
        ])->extends('layouts.template')->section('content');
    }
}
