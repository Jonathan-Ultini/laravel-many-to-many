<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'start_date', 'end_date', 'type_id', 'image'];

    // Relazione one-to-many con Type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Relazione many-to-many con Technology
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
