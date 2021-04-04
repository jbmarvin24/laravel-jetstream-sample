<?php

namespace App\Http\Controllers;

use App\Models\EmploymentStatus;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmploymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = EmploymentStatus::all();
        return Inertia::render('EmploymentStatuses/Index', [
            'employmentStatuses' => $statuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('EmploymentStatuses/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['string'],
        ]);

        EmploymentStatus::create($validated);

        return redirect('employment-statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentStatus  $employmentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentStatus $employmentStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmploymentStatus  $employmentStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentStatus $employmentStatus)
    {
        return Inertia::render('EmploymentStatuses/Edit', [
            'employmentStatus' => [
                'id' => $employmentStatus->id,
                'name' => $employmentStatus->name,
                'description' => $employmentStatus->description
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentStatus  $employmentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentStatus $employmentStatus)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100'],
            'description' => ['string'],
        ]);

        $employmentStatus->update($validated);

        return redirect('employment-statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentStatus  $employmentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentStatus $employmentStatus)
    {
        $employmentStatus->delete();

        return redirect('employment-statuses');
    }
}
