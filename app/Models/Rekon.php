<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'rekons';

    protected $fillable = [
        'bulan',
    ];

    public function valins()
    {
        return $this->hasMany(Valin::class);
    }

    public function getRouteKeyName()
    {
        return 'bulan';
    }
}
