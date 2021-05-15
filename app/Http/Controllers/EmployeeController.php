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
        $positions = Position::all();

        return view('pages.employees.inputs', ['positions' => $positions]);
    }

    public function edit(Employee $employee) {
        $positions = Position::all();

        return view('pages.employees.inputs', ['employee' => $employee, 'positions' => $positions]);
    }

    public function store() {

        // Validasi
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

        // Masukkan posisi
        $divisions = Position::where('id', request('position-id'))->select('division_id')->get();
        foreach($divisions as $d){
            $division = $d->division_id;
        }
        unset($divisions);

        // Store ke database
        Employee::create([
            'division_id' => $division,
            'position_id' => request('position-id'),
            'employee_identity_number' => 'TMS'.request('employee-identity-number'),
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

    public function update(Employee $employee) {
        // Validation
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
            'image' => 'mimes:jpg,png,jpeg,bmp|max:5048'
        ]);
 
        // Preprocess
        // #division_id
        $divisions = Position::where('id', request('position-id'))->select('division_id')->get();
        foreach($divisions as $d){
            $division = $d->division_id;
        }
        unset($divisions);

        // #image
        if((request('image')) != NULL) {
            $first_name = explode(" ", request('first-name'));
            $last_name = explode(" ", request('last-name'));
            $newImageName = time() . '-';
            
            foreach($first_name as $str) {
                if(count($last_name) > 0) {
                    $newImageName .= $str . '-';
                } else {
                    $newImageName .= $str;
                }
            }

            if(count($last_name) > 0) {
                foreach($last_name as $key => $str) {
                    if($key === array_key_last($last_name)) {
                        $newImageName .= $str;
                    } else {
                        $newImageName .= $str . '-';
                    }
                }
            }
            $newImageName .= '.'.request('image')->extension();

            // Store image
            request('image')->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $employee->image;
        }
        
        // Store
        $employee->update([
            'division_id' => $division,
            'position_id' => request('position-id'),
            'employee_identity_number' => 'TMS'.request('employee-identity-number'),
            'first_name' => request('first-name'),
            'last_name' => request('last-name'),
            'email' => request('email'),
            'address' => request('address'),
            'place_of_birth' => request('place-of-birth'),
            'date_of_birth' => request('date-of-birth'),
            'identity_card_number' => request('identity-card-number'),
            'phone_number' => request('phone-number'),
            'active' => request('active'),
            'image' => $newImageName,
        ]);

        // Redirect
        return redirect("/kepegawaian/edit/$employee->id")->with('status', 'Profile updated!');
    }
}