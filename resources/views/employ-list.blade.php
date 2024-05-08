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
                    <div class="table-responsive">
                    <table class="table table-bordered" id="employ-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Contact Number</th>
                                <th>Profile Picture</th>
                                <th>Join Date</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


