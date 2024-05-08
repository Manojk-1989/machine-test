@extends('layout')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ isset($company) ? 'Update Company' : 'Add Company' }}</h3>
              </div>
              @if(isset($company))
              <form id="company_form" data-url="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
              @else
              <form id="company_form" data-url="{{ route('company.store') }}" enctype="multipart/form-data">
              @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" value="{{ isset($company) ? $company->company_name : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="company_description">Description</label>
                    <textarea class="form-control" id="company_description" name="company_description" placeholder="Enter Company Description" rows="4">{{ isset($company) ? $company->company_description : '' }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="company_contact_number">Contact Number</label>
                    <input type="number" maxlength="10" class="form-control" id="company_contact_number" name="company_contact_number" placeholder="Enter Contact Number" value="{{ isset($company) ? $company->company_contact_number : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="company_logo">Company Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="company_logo" name="company_logo">
                        <label class="custom-file-label" for="company_logo">Choose file</label>
                      </div>
                    </div>
                  </div>
                  @if(isset($company) && $company->company_logo)
                  <div class="mt-2">
                    <img src="{{ asset('storage/logos/' . basename($company->company_logo)) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="annual_turnover">Annual Turnover</label>
                    <input type="number" class="form-control" id="annual_turnover" name="annual_turnover" placeholder="Enter Annual Turnover" value="{{ isset($company) ? $company->annual_turnover : '' }}">
                  </div>

                  <input type="hidden" id="company_id" name="company_id" value="{{ isset($company) ? $company->id : '' }}">
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
