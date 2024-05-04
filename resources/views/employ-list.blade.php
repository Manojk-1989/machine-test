@extends('layout')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employ List</h3>
              </div>
              <form id="company_form" data-url="{{ route('company.store') }}" enctype="multipart/form-data">
                <div class="card-body">
                <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Phone Number</th>
                                        <th>Image</th>
                                        <th>Join Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->company->company_name }}</td>

                                        <td>{{ $employee->mobile_number }}</td>
                                        <td>
        <img src="{{ asset('storage/profiles/' . basename($employee->image)) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
    </td>
                                        <td>{{ $employee->join_date }}</td>
                                        <td>
                                            <a href="{{ route('employ.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                            <button type="button" class="btn btn-danger delete-employ" data-url="{{ route('employ.destroy', $employee->id) }}">Delete</button>

                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
                
              </form>
            </div>@push('scripts')
    @if($page === 'company')
        <script src="{{ asset('customjs/company.js') }}"></script>
    @elseif($page === 'employ')
        <script src="{{ asset('customjs/employ.js') }}"></script>
    @endif
@endpush
          </div>
        </div>
      </div>
    </section>
@stop
