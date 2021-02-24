<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'deliveryDate',
        'description',
        'novelties',
    ];
    public function setName($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
