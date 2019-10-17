<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
