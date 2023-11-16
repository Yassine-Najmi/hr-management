<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    static public function getRecord(){
        $jobs = self::select('jobs.*');

        // Search start
        $id = Request()->get('id');
        $job_title = Request()->get('job_title');

        if (!empty($id)){
            $jobs = $jobs->where('id', '=', $id);
        } elseif (!empty($job_title)){
            $jobs = $jobs->where('job_title', 'like', '%' .$job_title. '%');
        }
        // Search end
        
                return $jobs
                ->orderBy('id', 'DESC')
                ->paginate(20);

        }
    }

    