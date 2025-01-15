<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'is_physical'];

    // Relationship
    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }
    public function accessRequests()
    {
        return $this->hasMany(AccessRequest::class);
    }
}
