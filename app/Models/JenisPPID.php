<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPPID extends Model
{
    protected $table = 'jenis_ppid';
    protected $primaryKey = 'id_jenis_ppid';
    public $timestamps = false;

    protected $fillable = ['nama_jenis_ppid'];

    public function juduls()
    {
        return $this->hasMany(JudulPpid::class, 'id_jenis_ppid');
    }

    public function ppids()
    {
        return $this->hasManyThrough(
            PPID::class,       
            JudulPpid::class,   
            'id_jenis_ppid',    
            'id_judul',         
            'id_jenis_ppid',    
            'id_judul'          
        );
    }
}
