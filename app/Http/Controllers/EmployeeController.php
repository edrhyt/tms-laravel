<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index(EmployeeDataTable $dataTable) {
        $breadcrumb = array(
            [
                'title' => 'Kepegawaian',
                'route' => 'employee',
            ]
        );
        return $dataTable->render('pages.employees.index', ['breadcrumb' => $breadcrumb, 'create_route' => route('employee.create')]);
    }

    public function create() {
        $divisions = Division::all();
        $positions = Position::all();

        return view('pages.employees.create', ['divisions' => $divisions, 'positions' => $positions]);
    }

    public function edit(Employee $employee) {
        
    }

    public function store() {
        request()->validate([
            'position-id' => 'required',
            'employee-identity-number' => 'required',
            'first-name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'place-of-birth' => 'required',
            'date-of-birth' => 'required',
            'identity-card-number' => 'required',
            'phone-number' => 'required',
        ]);

        $divisions = Position::where('id', request('position-id'))->select('division_id')->get();
        foreach($divisions as $d){
            $division = $d->division_id;
        }

        Employee::create([
            'division_id' => $division,
            'position_id' => request('position-id'),
            'employee_identity_number' => request('employee-identity-number'),
            'first_name' => request('first-name'),
            'last_name' => request('last-name'),
            'email' => request('email'),
            'address' => request('address'),
            'place_of_birth' => request('place-of-birth'),
            'date_of_birth' => request('date-of-birth'),
            'identity_card_number' => request('identity-card-number'),
            'phone_number' => request('phone-number'),
            'active' => request('active'),
        ]);
    }
}
