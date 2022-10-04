<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Rekomendasi extends Model
{
    use HasFactory;
    protected $table = 'rekomendasis';
    protected $fillable = ['alternatif_id', 'nilai_preferensi', 'keterangan'];
=======
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekomendasi extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'rekomendasis';
    protected $fillable = ['alternatif_id', 'nilai_preferensi', 'keterangan'];
    protected $dates = ['deleted_at'];
>>>>>>> d497433 (aa)
}
