<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Witel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'witels';

    protected $fillable = [
        'witel',
    ];

    public function valins()
    {
        return $this->hasMany(Valin::class);
    }

    public function getRouteKeyName()
    {
        return 'witel';
    }
}
