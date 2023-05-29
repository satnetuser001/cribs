<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Primary;

class Secondary extends Model
{
    use HasFactory;

    protected $table = 'secondarys';
    protected $fillable = ['car', ''];

    public function primary(){
        return $this->belongsTo(Primary::class);
    }
}
