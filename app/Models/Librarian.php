<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    // Relationship
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
    public function accessRequests()
    {
        return $this->hasMany(AccessRequest::class);
    }
}
