<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'valins';
    protected $with = ['user', 'witel', 'rekon'];

    protected $fillable = [
        'id_user',
        'id_witel',
        'id_valins',
        'gambar1',
        'gambar2',
        'gambar3',
        'ram3',
        'id_rekon',
        'keterangan'
    ];

    public function scopeEviden($query)
    {
        return $query->where('ram3', '!=', '-');
    }
    public function scopePelurusan($query)
    {
        return $query->where('ram3', '=', '-');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return $query->where(function ($query) use ($cari) {
                $query->where('id_valins', 'like', '%' . $cari . '%');
            });
        });
        $query->when($filters['witel'] ?? false, function ($query, $witel) {
            return $query->whereHas('witel', function ($query) use ($witel) {
                $query->where('id_witel', $witel);
            });
        });
    }

    public function witel()
    {
        return $this->belongsTo(Witel::class, 'id_witel');
    }
    public function rekon()
    {
        return $this->belongsTo(Rekon::class, 'id_rekon');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getRouteKeyName()
    {
        return 'id_valins';
    }
}
