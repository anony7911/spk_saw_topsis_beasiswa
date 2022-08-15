<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Rekomendasi;
use Livewire\WithPagination;

class DataPerhitungan extends Component
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

    public $kriterias, $alternatifs, $perhitungan;
    public $nama_kriteria, $atribut_kriteria, $bobot_kriteria, $kriteriaId;
    public $nama_lengkap, $nis, $kelas, $pekerjaan_ortu, $penghasilan_ortu, $jumlah_tanggungan, $status_anak, $pemegang_kks, $pemegang_pkh, $pemegang_sktm, $alternatifId;
    public $max_pekerjaan_ortu, $max_penghasilan_ortu, $max_jumlah_tanggungan, $max_status_anak, $max_pemegang_kks, $max_pemegang_pkh, $max_pemegang_sktm;
    public $min_pekerjaan_ortu, $min_penghasilan_ortu, $min_jumlah_tanggungan, $min_status_anak, $min_pemegang_kks, $min_pemegang_pkh, $min_pemegang_sktm;
    public $y_pekerjaan_ortu, $y_penghasilan_ortu, $y_jumlah_tanggungan, $y_status_anak, $y_pemegang_kks, $y_pemegang_pkh, $y_pemegang_sktm;
    public $p_pekerjaan_ortu, $p_penghasilan_ortu, $p_jumlah_tanggungan, $p_status_anak, $p_pemegang_kks, $p_pemegang_pkh, $p_pemegang_sktm;
    public $n_pekerjaan_ortu, $n_penghasilan_ortu, $n_jumlah_tanggungan, $n_status_anak, $n_pemegang_kks, $n_pemegang_pkh, $n_pemegang_sktm;
    public $solusi_ideal_positif, $solusi_ideal_negatif;
    public $jarak_positif, $jarak_negatif;
    public $preferensi = [];
    public $nilai_preferensi, $alternatif_id, $rekomendasi, $jml_penerima, $keterangan;
    // public $nilai_preferensi;
    public function render()
    {
        $this->kriterias = Kriteria::all();
        $this->alternatifs = Alternatif::all();
        $this->max_pekerjaan_ortu = Alternatif::max('pekerjaan_ortu');
        $this->max_penghasilan_ortu = Alternatif::max('penghasilan_ortu');
        $this->max_jumlah_tanggungan = Alternatif::max('jumlah_tanggungan');
        $this->max_status_anak = Alternatif::max('status_anak');
        $this->max_pemegang_kks = Alternatif::max('pemegang_kks');
        $this->max_pemegang_pkh = Alternatif::max('pemegang_pkh');
        $this->max_pemegang_sktm = Alternatif::max('pemegang_sktm');

        $this->min_pekerjaan_ortu = Alternatif::min('pekerjaan_ortu');
        $this->min_penghasilan_ortu = Alternatif::min('penghasilan_ortu');
        $this->min_jumlah_tanggungan = Alternatif::min('jumlah_tanggungan');
        $this->min_status_anak = Alternatif::min('status_anak');
        $this->min_pemegang_kks = Alternatif::min('pemegang_kks');
        $this->min_pemegang_pkh = Alternatif::min('pemegang_pkh');
        $this->min_pemegang_sktm = Alternatif::min('pemegang_sktm');
        //perhitungan saw
        foreach ($this->kriterias as $kriteria) {
            foreach ($this->alternatifs as $alternatif) {
                if ($kriteria->id == 1) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->pekerjaan_ortu[$alternatif->id] = $alternatif->pekerjaan_ortu / $this->max_pekerjaan_ortu;
                    } else {
                        $this->pekerjaan_ortu[$alternatif->id] = $this->min_pekerjaan_ortu / $alternatif->pekerjaan_ortu;
                    }
                }
                if ($kriteria->id == 2) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->penghasilan_ortu[$alternatif->id] = $alternatif->penghasilan_ortu / $this->max_penghasilan_ortu;
                    } else {
                        $this->penghasilan_ortu[$alternatif->id] = $this->min_penghasilan_ortu / $alternatif->penghasilan_ortu;
                    }
                }
                if ($kriteria->id == 3) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->jumlah_tanggungan[$alternatif->id] = $alternatif->jumlah_tanggungan / $this->max_jumlah_tanggungan;
                    } else {
                        $this->jumlah_tanggungan[$alternatif->id] = $this->min_jumlah_tanggungan / $alternatif->jumlah_tanggungan;
                    }
                }
                if ($kriteria->id == 4) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->status_anak[$alternatif->id] = $alternatif->status_anak / $this->max_status_anak;
                    } else {
                        $this->status_anak[$alternatif->id] = $this->min_status_anak / $alternatif->status_anak;
                    }
                }
                if ($kriteria->id == 5) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->pemegang_kks[$alternatif->id] = $alternatif->pemegang_kks / $this->max_pemegang_kks;
                    } else {
                        $this->pemegang_kks[$alternatif->id] = $this->min_pemegang_kks / $alternatif->pemegang_kks;
                    }
                }
                if ($kriteria->id == 6) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->pemegang_pkh[$alternatif->id] = $alternatif->pemegang_pkh / $this->max_pemegang_pkh;
                    } else {
                        $this->pemegang_pkh[$alternatif->id] = $this->min_pemegang_pkh / $alternatif->pemegang_pkh;
                    }
                }
                if ($kriteria->id == 7) {
                    if ($kriteria->atribut_kriteria == 'benefit') {
                        $this->pemegang_sktm[$alternatif->id] = $alternatif->pemegang_sktm / $this->max_pemegang_sktm;
                    } else {
                        $this->pemegang_sktm[$alternatif->id] = $this->min_pemegang_sktm / $alternatif->pemegang_sktm;
                    }
                }
            }
        }
        // dd($this->pekerjaan_ortu);
        //Perhitungan Topsis
        //matriks terbobot Y
        foreach ($this->kriterias as $kriteria) {
            foreach ($this->alternatifs as $alternatif) {
                if ($kriteria->id == 1) {
                    $this->y_pekerjaan_ortu[$alternatif->id] = $this->pekerjaan_ortu[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 2) {
                    $this->y_penghasilan_ortu[$alternatif->id] = $this->penghasilan_ortu[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 3) {
                    $this->y_jumlah_tanggungan[$alternatif->id] = $this->jumlah_tanggungan[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 4) {
                    $this->y_status_anak[$alternatif->id] = $this->status_anak[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 5) {
                    $this->y_pemegang_kks[$alternatif->id] = $this->pemegang_kks[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 6) {
                    $this->y_pemegang_pkh[$alternatif->id] = $this->pemegang_pkh[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                } elseif ($kriteria->id == 7) {
                    $this->y_pemegang_sktm[$alternatif->id] = $this->pemegang_sktm[$alternatif->id] * $kriteria->bobot_kriteria / 100;
                }
            }
        }
        // dd($this->y_pekerjaan_ortu);
        //solusi ideal positif
        foreach ($this->kriterias as $kriteria) {
            if ($kriteria->id == 1) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_pekerjaan_ortu = max($this->y_pekerjaan_ortu);
                } else {
                    $this->p_pekerjaan_ortu = min($this->y_pekerjaan_ortu);
                }
            } elseif ($kriteria->id == 2) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_penghasilan_ortu = max($this->y_penghasilan_ortu);
                } else {
                    $this->p_penghasilan_ortu = min($this->y_penghasilan_ortu);
                }
            } elseif ($kriteria->id == 3) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_jumlah_tanggungan = max($this->y_jumlah_tanggungan);
                } else {
                    $this->p_jumlah_tanggungan = min($this->y_jumlah_tanggungan);
                }
            } elseif ($kriteria->id == 4) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_status_anak = max($this->y_status_anak);
                } else {
                    $this->p_status_anak = min($this->y_status_anak);
                }
            } elseif ($kriteria->id == 5) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_pemegang_kks = max($this->y_pemegang_kks);
                } else {
                    $this->p_pemegang_kks = min($this->y_pemegang_kks);
                }
            } elseif ($kriteria->id == 6) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_pemegang_pkh = max($this->y_pemegang_pkh);
                } else {
                    $this->p_pemegang_pkh = min($this->y_pemegang_pkh);
                }
            } elseif ($kriteria->id == 7) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->p_pemegang_sktm = max($this->y_pemegang_sktm);
                } else {
                    $this->p_pemegang_sktm = min($this->y_pemegang_sktm);
                }
            }
        }
        //solusi ideal negatif
        foreach ($this->kriterias as $kriteria) {
            if ($kriteria->id == 1) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_pekerjaan_ortu = min($this->y_pekerjaan_ortu);
                } else {
                    $this->n_pekerjaan_ortu = max($this->y_pekerjaan_ortu);
                }
            } elseif ($kriteria->id == 2) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_penghasilan_ortu = min($this->y_penghasilan_ortu);
                } else {
                    $this->n_penghasilan_ortu = max($this->y_penghasilan_ortu);
                }
            } elseif ($kriteria->id == 3) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_jumlah_tanggungan = min($this->y_jumlah_tanggungan);
                } else {
                    $this->n_jumlah_tanggungan = max($this->y_jumlah_tanggungan);
                }
            } elseif ($kriteria->id == 4) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_status_anak = min($this->y_status_anak);
                } else {
                    $this->n_status_anak = max($this->y_status_anak);
                }
            } elseif ($kriteria->id == 5) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_pemegang_kks = min($this->y_pemegang_kks);
                } else {
                    $this->n_pemegang_kks = max($this->y_pemegang_kks);
                }
            } elseif ($kriteria->id == 6) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_pemegang_pkh = min($this->y_pemegang_pkh);
                } else {
                    $this->n_pemegang_pkh = max($this->y_pemegang_pkh);
                }
            } elseif ($kriteria->id == 7) {
                if ($kriteria->atribut_kriteria == 'benefit') {
                    $this->n_pemegang_sktm = min($this->y_pemegang_sktm);
                } else {
                    $this->n_pemegang_sktm = max($this->y_pemegang_sktm);
                }
            }
        }
        foreach ($this->alternatifs as $alternatif) {
            $this->jarak_positif[$alternatif->id] = sqrt(
                pow($this->y_pekerjaan_ortu[$alternatif->id] - $this->p_pekerjaan_ortu, 2) +
                pow($this->y_penghasilan_ortu[$alternatif->id] - $this->p_penghasilan_ortu, 2) +
                pow($this->y_jumlah_tanggungan[$alternatif->id] - $this->p_jumlah_tanggungan, 2) +
                pow($this->y_status_anak[$alternatif->id] - $this->p_status_anak, 2) +
                pow($this->y_pemegang_kks[$alternatif->id] - $this->p_pemegang_kks, 2) +
                pow($this->y_pemegang_pkh[$alternatif->id] - $this->p_pemegang_pkh, 2) +
                pow($this->y_pemegang_sktm[$alternatif->id] - $this->p_pemegang_sktm, 2)

            );
            $this->jarak_negatif[$alternatif->id] = sqrt(
                pow($this->y_pekerjaan_ortu[$alternatif->id] - $this->n_pekerjaan_ortu, 2) +
                pow($this->y_penghasilan_ortu[$alternatif->id] - $this->n_penghasilan_ortu, 2) +
                pow($this->y_jumlah_tanggungan[$alternatif->id] - $this->n_jumlah_tanggungan, 2) +
                pow($this->y_status_anak[$alternatif->id] - $this->n_status_anak, 2) +
                pow($this->y_pemegang_kks[$alternatif->id] - $this->n_pemegang_kks, 2) +
                pow($this->y_pemegang_pkh[$alternatif->id] - $this->n_pemegang_pkh, 2) +
                pow($this->y_pemegang_sktm[$alternatif->id] - $this->n_pemegang_sktm, 2)

            );
        }
        //nilai preferensi
        foreach ($this->alternatifs as $alternatif) {

            $this->preferensi[] = $this->jarak_negatif[$alternatif->id] / ($this->jarak_positif[$alternatif->id] + $this->jarak_negatif[$alternatif->id]);
        }
        return view('livewire.data-perhitungan', [
            // 'item' => $this->item,
            'kriterias' => $this->kriterias,
            'alternatifs' => $this->alternatifs,
            'preferensi' => $this->preferensi,
            'jarak_positif' => $this->jarak_positif,
            'jarak_negatif' => $this->jarak_negatif,
            'p_pekerjaan_ortu' => $this->p_pekerjaan_ortu,
            'p_penghasilan_ortu' => $this->p_penghasilan_ortu,
            'p_jumlah_tanggungan' => $this->p_jumlah_tanggungan,
            'p_status_anak' => $this->p_status_anak,
            'p_pemegang_kks' => $this->p_pemegang_kks,
            'p_pemegang_pkh' => $this->p_pemegang_pkh,
            'p_pemegang_sktm' => $this->p_pemegang_sktm,
            'n_pekerjaan_ortu' => $this->n_pekerjaan_ortu,
            'n_penghasilan_ortu' => $this->n_penghasilan_ortu,
            'n_jumlah_tanggungan' => $this->n_jumlah_tanggungan,
            'n_status_anak' => $this->n_status_anak,
            'n_pemegang_kks' => $this->n_pemegang_kks,
            'n_pemegang_pkh' => $this->n_pemegang_pkh,
            'n_pemegang_sktm' => $this->n_pemegang_sktm,
            'y_pekerjaan_ortu' => $this->y_pekerjaan_ortu,
            'y_penghasilan_ortu' => $this->y_penghasilan_ortu,
            'y_jumlah_tanggungan' => $this->y_jumlah_tanggungan,
            'y_status_anak' => $this->y_status_anak,
            'y_pemegang_kks' => $this->y_pemegang_kks,
            'y_pemegang_pkh' => $this->y_pemegang_pkh,
            'y_pemegang_sktm' => $this->y_pemegang_sktm,
            'pekerjaan_ortu' => $this->pekerjaan_ortu,
            'penghasilan_ortu' => $this->penghasilan_ortu,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'status_anak' => $this->status_anak,
            'pemegang_kks' => $this->pemegang_kks,
            'pemegang_pkh' => $this->pemegang_pkh,
            'pemegang_sktm' => $this->pemegang_sktm,
        ]);
    }

    public function store(){
        $aa = 0;
        $bb = 0;
        foreach ($this->alternatifs as $alternatif) {
            if($this->preferensi[$bb++] > 0.49){
                $this->keterangan = 'Layak';
            }else{
                $this->keterangan = 'Tidak Layak';
            }

            $this->rekomendasi = Rekomendasi::create([
                'alternatif_id' => $alternatif->id,
                'nilai_preferensi' => number_format($this->preferensi[$aa++], 2),
                'keterangan' => $this->keterangan,
            ]);
        }
        return redirect()->route('rekomendasi')->with('success', 'Data hasil perhitungan berhasil disimpan.');
    }
}
