<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use App\Models\Employee;
use App\Models\EmploymentStatus;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$employees = Employee::select('id', 'name', 'birthday', 'age', 'employment_status_id')->with('employmentStatus:id,name')->get();


        return Inertia::render('Employees/Index', [
            'employees' => Employee::select('id', 'name', 'birthday', 'age', 'employment_status_id')->with('employmentStatus:id,name')
                ->paginate(10)
                ->withQueryString()
                ->through(function ($employee) {
                    return [
                        'id' => $employee->id,
                        'name' => $employee->name,
                        'age' => $employee->age,
                        'birthday' => $employee->birthday,
                        'employmentStatus' => $employee->employmentStatus->only('name')
                    ];
                })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employmentStatuses = EmploymentStatus::select(['id', 'name'])->get();
        return Inertia::render('Employees/Create', [
            'employmentStatuses' => $employmentStatuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validated = request()->validate([
            'name' => ['required', 'max:100'],
            'birthday' => ['required', 'date'],
            'age' => ['required', 'numeric'],
            'employment_status_id' => ['required']
        ]);
        Employee::create($validated);

        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employmentStatuses = EmploymentStatus::all();

        return Inertia::render('Employees/Edit', [
            'employee' => [
                'id' => $employee->id,
                'name' => $employee->name,
                'birthday' => $employee->birthday,
                'age' => $employee->age,
                'employment_status_id' => $employee->employment_status_id
            ],
            'employmentStatuses' => $employmentStatuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee)
    {
        $validated = request()->validate([
            'name' => ['required', 'max:100'],
            'birthday' => ['required', 'date'],
            'age' => ['required', 'numeric'],
            'employment_status_id' => ['required']
        ]);

        $employee->update($validated);

        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('employees');
    }
}
