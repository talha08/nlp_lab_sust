<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword,EntrustUserTrait {
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
    }




    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];




    /**
     * One to Many relationship with Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teachers(){
        return $this->hasOne('App\Teacher','user_id','id');
    }


    /**
     * One to Many relationship with Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function students(){
        return $this->hasOne('App\Student','user_id','id');
    }



    /**
     * One to Many relationship with OtherUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function otherUsers(){
        return $this->hasOne('App\OtherUser','user_id','id');
    }



    /**
     * for User and Book Table One To Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books(){
        return $this->hasMany('App\Book','user_id','id');
    }

    /**
     * For User and Blog One To Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs(){
        return $this->hasMany('App\Blog','user_id','id');
    }


    /**
     * for Award and User  Pivot Table Many to Many Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function awards(){
        return $this->belongsToMany('App\Award','award_user','award_id','user_id');
    }

    /**
     * For Project and User Many to Many Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(){
        return $this->belongsToMany('App\Project','project_user','project_id','user_id');
    }

    /**
     * For User and Paper Many To Many RelationShip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function papers(){
        return $this->belongsToMany('App\Paper','paper_user','paper_id','user_id');
    }
}