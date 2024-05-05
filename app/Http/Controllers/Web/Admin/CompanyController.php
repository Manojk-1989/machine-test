<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Auth;
use App\Traits\TimezoneTrait;


class CompanyController extends Controller
{
    use TimezoneTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(1);
        $page = 'company';
        return view('company-list', compact('companies','page'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'company';
        return view('company',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try {
            $data = $request->validated();
            $logoPath = $request->file('company_logo')->store('logos', 'public');

            $company = new Company([
                'company_name' => $data['company_name'],
                'company_description' => $data['company_description'],
                'company_logo' => $logoPath,
                'company_contact_number' => $data['company_contact_number'],
                'annual_turnover' => $data['annual_turnover'],
                'created_by' => Auth::id(),
                'created_at' => now(),
                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);
            $company->created_at = now()->setTimezone($this->getTimeZoneFromOffset($request->timezone_offset));
            $company->updated_at = now()->setTimezone($this->getTimeZoneFromOffset($request->timezone_offset));
            $company->save();

            return response()->json(['message' => 'Company created successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('company', ['company' => $company, 'page' => 'company']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $company = Company::findOrFail($id);

            if ($request->hasFile('company_logo')) {
                Storage::disk('public')->delete($company->company_logo);
                $logoPath = $request->file('company_logo')->store('logos', 'public');
                $company->company_logo = $logoPath;
            }

            $company->company_name = $request->company_name;
            $company->company_description = $request->company_description;
            $company->company_contact_number = $request->company_contact_number;
            $company->annual_turnover = $request->annual_turnover;
            $company->updated_by = Auth::id();
            $company->updated_at = now()->setTimezone($this->getTimeZoneFromOffset($request->timezone_offset));
            $company->save();

            return response()->json(['message' => 'Company updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        if (!$company->employs->isEmpty()) {
            return response()->json(['message' => 'Cannot delete company with associated employees'], 200);
        }

        $company->delete();
        return response()->json(['message' => 'Deleted company successfully'], 200);
    }
}
