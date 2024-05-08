<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employ;
use Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\Datatables;



use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Company::get(); // Use the Company model to query datadd()
            // dd($data);
            $data = Employ::select('*');
            return DataTables::of($data)
            ->make(true);
        }
        $employees = Employ::with('company')->paginate(1);
        $page = 'employ';
        return view('employ-list', compact('employees','page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $page = 'employ';
        return view('employ', compact('companies', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        try {
            $logoPath = $request->file('image')->store('profiles', 'public');

            $employee = new Employ();
            $employee->name = $data['name'];
            $employee->email = $data['email'];
            $employee->image = $logoPath;
            $employee->company_id = $data['company_id'];
            $employee->mobile_number = $data['mobile_number'];
            $employee->join_date = $data['join_date'];
            $employee->created_by = Auth::id();
            $employee->updated_by = Auth::id();
            $employee->save();

            return response()->json(['message' => 'Company created successfully'], 201);
  
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something wenyt wrong'], 500);
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
        $employee = Employ::findOrFail($id);
        $companies = Company::all();
        return view('employ', ['employee' => $employee, 'companies' => $companies, 'page' => 'employ']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $employ = Employ::findOrFail($id);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($employ->image);
                $logoPath = $request->file('image')->store('profiles', 'public');
                $employ->image = $logoPath;
            }

            $employ->name = $request->name;
            $employ->email = $request->email;
            $employ->company_id = $request->company_id;
            $employ->mobile_number = $request->mobile_number;
            $employ->join_date = $request->join_date;
            $employ->updated_by = Auth::id();
            $employ->updated_at = now();
            $employ->save();

            return response()->json(['message' => 'Employe details updated successfully'], 200);
        } catch (\Throwable $th) {dd($th);
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $employee = Employ::findOrFail($id);
        
            if ($employee->image) {
                Storage::disk('public')->delete($employee->image);
            }
        
            $employee->delete();
        
            return response()->json(['message' => 'Employee deleted successfully'], 200);
        } catch (\Throwable $th) {dd($th);
            return response()->json(['message' => 'Something went wrong'], 200);
        }
        
    }
}
