@extends('layout')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Company List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Logo</th>
                                    <th>Description</th>
                                    <th>Contact Number</th>
                                    <th>Annual Turnover</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->company_name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/logos/' . basename($company->company_logo)) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td>{{ $company->company_description }}</td>
                                    <td>{{ $company->company_contact_number }}</td>
                                    <td>{{ $company->annual_turnover }}</td>
                                    <td>
                                        <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                                        <button type="button" class="btn btn-danger delete-company" data-url="{{ route('company.destroy', $company->id) }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
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
        <script src="{{ asset('customjs/employee.js') }}"></script>
    @endif
@endpush
