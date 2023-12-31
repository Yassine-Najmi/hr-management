<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getRecord()
    {
        $users = self::select('users.*');

        // Search start 
        $id = Request()->get('id');
        $name = Request()->get('name');
        $last_name = Request()->get('last_name');

        if (!empty($id)) {
            $users = $users->where('id', '=', $id);
        } elseif (!empty($name)) {
            $users = $users->where('name', 'like', '%' . $name . '%');
        } elseif (!empty($last_name)) {
            $users = $users->where('last_name', 'like', '%' . $last_name . '%');
        }

        // Search end

        return $users
            ->orderBy('id', 'DESC')
            ->paginate(20);
    }

    public function job()
    {
        return $this->hasOne(Jobs::class, 'id', 'job_id');
    }
}
