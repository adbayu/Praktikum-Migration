<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = ['nama','alamat','email','no_telepon'];

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}