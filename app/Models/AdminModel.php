<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = "admin"; //protected $table untuk konvensi penamaan tabel karna laravel default mengharuskan pakai akhiran s, seperti mahasiswas
    protected $guarded = ['id']; // Semua kolom yang kita tambahkan ke $guarded akan diabaikan
}
