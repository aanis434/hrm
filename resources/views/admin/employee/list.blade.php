    
@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
      <h1>
        Employee
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <a href="{{ route('employee.create') }}" class="btn btn-info btn-sm">Create New Employee</a>
      </ol>
    </section>
    <section>
      
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          @include('admin.alert')
          <div class="box">
            <div class="box-header">
              <h5 class="box-title">Employee Details</h5>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Designation</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
                @forelse ($employee as $key=>$value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->designation }}</td>
                  <td>{{ $value->salary }}</td>
                  <td>
                      <a href="{{ route('employee.edit',$value->id)}}" class="btn btn-xs btn-info"><i class="fa fa-fw fa-edit"></i></a> &nbsp;
                       <a href="javascript:void()" data-toggle="modal" data-target="#deleteModal_{{$value->id}}" class="btn btn-xs btn-danger"><i class="fa fa-fw fa-trash-o"></i></a>
                      <!-- Modal form from confirmation Delete!!  -->
                      <div class="modal" id="deleteModal_{{$value->id}}">
                          <div class="modal-dialog">
                              <div class="modal-content">

                                  <!-- Modal body -->
                                  <div class="modal-body text-center" style="padding: 50px;">
                                      <form action="{{ route('employee.destroy', $value->id)}}"
                                          method="post">
                                          @csrf
                                          @method('DELETE')
                                          <h5>Are you sure want to delete <b>{{ $value->name }}</b>?</h5>
                                          <br>
                                          <button type="submit"
                                              class="btn btn-danger">Confirm</button>
                                          <button type="button" class="btn btn-info"
                                              data-dismiss="modal">Cancel</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
                </tr>
                @empty
                <th colspan="6" class="text-center">No record found!</th>
                @endforelse 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  @endsection