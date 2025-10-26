<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatistik extends Model
{
    use HasFactory;

    protected $table = 'data_statistik';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['tahun', 'jumlah', 'id_subkategori', 'id_user'];

    public function subkategori()
    {
        return $this->belongsTo(SubkategoriStatistik::class, 'id_subkategori', 'id_subkategori');
    }
}
