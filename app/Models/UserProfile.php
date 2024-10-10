<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Concerns\HasUuid;
class UserProfile extends Model
{
    use HasFactory,HasUuid;
    protected $table = 'user_profiles';
    protected $fillable = ['name','bio','user_id', 'uuid', 'phone', 'address',];
    public function owner(): BelongsTo {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }
}
