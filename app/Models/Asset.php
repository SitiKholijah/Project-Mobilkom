<?php

namespace App\Models; // <-- Pastikan namespace ini benar

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model // <-- Pastikan nama class ini benar
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Tambahkan baris ini jika Anda menggunakan Asset::create()
    protected $fillable = [
        'asset_name',
        'project_name',
        'category',
        'status',
        'id_inventory',
        'serial_number',
        'image',
        'company'
    ];
}