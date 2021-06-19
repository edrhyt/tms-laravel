<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Tampilkan view absensi
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employee = Employee::all();

        return view("pages/absensi/index", [
            "employees" => $employee,
        ]);
    }

    /**
     * Ambil data absensi karyawan dari database dan kirim melalui ajax
     *
     * @return String
     */
    public function searchEmp(Employee $employee)
    {
        return $employee->toJson();
    }

    /**
     * Submit absensi dan simpan ke database
     *
     * @return void
     */
    public function submitAbsen()
    {
    }

    public function testAlert()
    {
        Alert::success("alerta");
        return redirect()->back();
    }
}
