<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Employee\Entities\Salary;

class EmpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Salary::all();
    }
    public function headings() :array {
        return ["Tên", "Chức vụ", "Lương cơ bản", "Tiền khen thưởng", "Hoa Hồng", "BHYT", "BHXH", "BHTN"];
    }
}
