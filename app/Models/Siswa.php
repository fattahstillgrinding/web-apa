<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'email',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
