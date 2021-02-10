<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'finished_at'];
    protected $dates = ['finished_at'];

    public function getFinishedAtAttribute($dates)
    {
        return $dates ? Carbon::parse($dates) : null;
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
