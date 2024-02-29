<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'commission_pct',
        'manager_id',
        'department_id',
        'is_role',
        'remember_token',
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
        'hire_date' => 'date',
    ];


    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id', 'id');
    }



    public static function getAllEmployees(Request $request)
    {

        $search = $request->input('search');

        if (!empty($search)) {
            $employees = self::select('users.*')
                ->orderBy('id', 'DESC')
                ->where('is_role', 0)
                ->where(function ($query) use ($search) {
                    $query->where('id', '=', $search)
                        ->orwhere('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone_number', 'like', '%' . $search . '%')
                        ->orWhere('hire_date', 'like', '%' . $search . '%')
                        ->orWhere('job_id', 'like', '%' . $search . '%')
                        ->orWhere('salary', 'like', '%' . $search . '%')
                        ->orWhere('commission_pct', 'like', '%' . $search . '%')
                        ->orWhere('manager_id', 'like', '%' . $search . '%')
                        ->orWhere('department_id', 'like', '%' . $search . '%');
                })
                ->paginate(10);
            return $employees;
        } else {
            $employees = self::select('users.*')
                ->orderBy('id', 'DESC')
                ->where('is_role', 0)
                ->paginate(10);
            return $employees;
        }
    }
}
