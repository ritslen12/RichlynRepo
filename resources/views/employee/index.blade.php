@extends('layouts.app')

@section('content')

<div class="card">
    <div class="content" style="width: 80%; margin: auto; padding-bottom: 3%;">
      <div class="card card-info">
        <div class="card-header" >
          <h3 class="card-title">Add New Employee</h3>
        </div>


        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name">
                        </div><div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>
                        <div class="col-md-5">
                            <label>Birthday</label>
                            <input type="date" class="form-control" name="birthday">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-6">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $employees as $key => $employee )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $employee->first_name }}</td>
                            <td scope="col">{{ $employee->last_name }}</td>
                            <td scope="col">{{ $employee->birthday }}</td>
                            <td scope="col">{{ $employee->phone }}</td>
                            <td scope="col">

                            <a href="{{  route('employee.edit', $employee->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
              background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush