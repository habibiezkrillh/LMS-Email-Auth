<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    // Relationship
    public function librarians()
    {
        return $this->hasMany(Librarian::class);
    }
}
