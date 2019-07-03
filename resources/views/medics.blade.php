@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctors | Specialties</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check())
                    <div class="container">
                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th>Doctor | Last Name</th>
                              <th>Doctor | First Name</th>
                              <th>Specialty</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($entries as $entry)
                            <tr>
                              <th scope="row">{{ $entry->doctor->last_name }}</th>
                              <td>{{ $entry->doctor->first_name }}</td>
                              <td>{{ $entry->specialty->name }}</td>
                            </tr>
                            @endforeach         
                          </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
