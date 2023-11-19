<?php

namespace App\Exports;

use App\Models\Jobs;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $request = Jobs::all();
        return Jobs::getRecord($request);
    }
}
