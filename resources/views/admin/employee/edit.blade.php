@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
      <h1>
        Employee
        <small>Update</small>
      </h1>
      <ol class="breadcrumb">
        @if(Auth::user()->is_admin)
          <a href="{{ route('employee.index') }}" class="btn btn-info btn-sm">All Employee List</a>
        @endif
        
      </ol>
    </section>
    <section>
      
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-6">
          <!-- general form elements -->
          @include('admin.alert')
          <div class="box box-primary">
            <div class="box-header with-border">
              <h6 class="box-title">Edit Information</h6>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf
                        @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}"  autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                 <div class="form-group">
                  <label for="designation">Designation</label>
                  <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $employee->designation }}"  autocomplete="name" autofocus>

                  @error('designation')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                 <div class="form-group">
                  <label for="dob">Date of Birth</label>
                  <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $employee->dob }}"  autocomplete="dob" autofocus>

                  @error('dob')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                <label for="salary">Salary</label>
                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $employee->salary }}" autocomplete="salary"  {{ Auth::user()->is_admin ?'':'readonly'}} autofocus>

                  @error('salary')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              </div>

              
              <!-- /.box-body -->

              <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection