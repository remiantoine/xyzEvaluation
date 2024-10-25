<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public function tracks()
    {
        return $this->hasMany(Track::class, 'category_id');
    }
    public function total()
    {
        return $this->tracks()->count();
    }
    public function isEmpty()
    {
        return $this->total() === 0;
    }
}
