<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequest extends Model
{
    use HasFactory;

    protected $fillable = ['collection_id', 'user_id', 'status'];

    // Relationship
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
