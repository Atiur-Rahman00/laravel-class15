<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\user;

class category extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['category_name'];
    public function relationtouser(){
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
