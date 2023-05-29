<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Secondary;

class Primary extends Model
{
    use HasFactory;

    protected $table = 'primarys';
    protected $fillable = ['userName'];

    public function secondary(){
        return $this->hasMany(Secondary::class);
    }
}
