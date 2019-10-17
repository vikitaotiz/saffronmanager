<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jazmy\FormBuilder\Traits\HasFormBuilderTraits;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Models\Submission;
use Illuminate\Auth\Notifications\ResetPassword;
use Cmgmyr\Messenger\Traits\Messagable;

use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasFormBuilderTraits;
    use Messagable;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id', 'department_id'];
    protected $hidden = ['password', 'remember_token'];



    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function departments()
    {
      return $this->belongsToMany(Department::class);
    }

    public function forms(){
      return $this->hasMany(Form::class);
    }

    public function clients(){
      return $this->hasMany(Client::class);
    }

    public function submissions(){
      return $this->hasMany(Submission::class);
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }

    public function hasDepartment($departmentId)
    {
        return in_array($departmentId, $this->departments->pluck('id')->toArray());
    }
}
