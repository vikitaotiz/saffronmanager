<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Models\Submission;

class Department extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function threads()
    {
        return $this->hasMany('Cmgmyr\Messenger\Models\Thread');
    }
}
