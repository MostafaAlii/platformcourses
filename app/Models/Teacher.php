<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Teacher extends Authenticatable implements JWTSubject {
    use HasFactory, Notifiable;

    protected $table = 'teachers';

    protected $fillable = ['name','email','password','phone', 'status'];

    protected $hidden = ['password','remember_token',];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'string',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
    public function profile(): HasOne {
        return $this->hasOne(related:TeacherProfile::class, foreignKey:'teacher_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
