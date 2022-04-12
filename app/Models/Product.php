<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //definisi tabel produk
    protected $tabel = 'products';

    //mempersilahkan inputan mana yang boleh langsung di input
    protected $fillable = ['name','price','type','expired_at'];
}
