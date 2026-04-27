<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;

    protected $fillable = [
        'kode_mk',
        'nama_matakuliah',
        'sks'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
}
