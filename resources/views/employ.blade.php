@extends('layout')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Employee CRUD Section -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ isset($employee) ? 'Update Employee' : 'Add Employee' }}</h3>
              </div>
              @if(isset($employee))
              <form id="employee_form" data-url="{{ route('employ.update', $employee->id) }}" enctype="multipart/form-data">
              @else
              <form id="employee_form" data-url="{{ route('employ.store') }}" enctype="multipart/form-data">
              @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($employee) ? $employee->name : '' }}" placeholder="Enter Employee Name" value="{{ isset($employee) ? $employee->name : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($employee) ? $employee->email : '' }}" placeholder="Enter Employee Email" value="{{ isset($employee) ? $employee->email : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="company_id">Company</label>
                    <select class="form-control" id="company_id" name="company_id">
                      @foreach($companies as $company)
                          <option value="{{ $company->id }}" {{ isset($employee) && $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ isset($employee) ? $employee->mobile_number : '' }}" placeholder="Enter Employee Mobile Number" value="{{ isset($employee) ? $employee->mobile_number : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  @if(isset($employee) && $employee->image)
                  <div class="mt-2">
                    <img src="{{ asset('storage/profiles/' . basename($employee->image)) }}" alt="Employee Image" style="max-width: 100px; max-height: 100px;">
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="join_date">Join Date</label>
                    <input type="date" class="form-control" id="join_date" name="join_date" value="{{ isset($employee) ? $employee->join_date : '' }}">
                  </div>
                  <input type="text" id="employee_id" name="employee_id" value="{{ isset($employee) ? $employee->id : '' }}">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    @stop
    @push('scripts')
    @if($page === 'company')
        <script src="{{ asset('customjs/company.js') }}"></script>
    @elseif($page === 'employ')
        <script src="{{ asset('customjs/employ.js') }}"></script>
    @endif
@endpush