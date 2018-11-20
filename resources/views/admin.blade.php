@extends('layouts.app')

@section('content')
<div class="container">
            <h1 class="text-center" style="margin-bottom:25px ; margin-right: 60px" >Welcome To Admin Page</h1>
            <form action="http://127.0.0.1:8000/api/empname" method="get">
              <input type="text" name="firstname" class="form-control offset-3 col-sm-6" style="margin-bottom: 10px ;" >

                <a href="/Add"
                   class="btn btn-success   offset-5 col-sm-1" style="margin-bottom: 10px">
                    <i class="fa fa-plus" style="margin-right: 3px"></i>Add</a>

                    <button type="submit" class="btn btn-warning" style="margin-bottom: 10px; color:white">
                         <i class="fa fa-search"></i> search
                      </button>

            </form>

            <div class="table-responsive text-center">
                <table class="main-table table table-bordered">
                    <tr style="background-color: #333;
    color: white;
    text-align: center;">
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Job Title</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>


                        @foreach($employees as $employee)
                        @if($employee->user->Admin == 0)

                        <tr>

                                <td>{{$employee->firstName}}</td>
                                <td>{{$employee->lastName}}</td>
                                <td>{{$employee->user->name}}</td>
                                <td>{{$employee->user->email}}</td>
                                <td>{{$employee->jobTitle}}</td>
                                <td><img src ="{{ Storage::url($employee->image)}}" width="100" height="100"/></td>
                                <td>
                                    <a href="/Delete/{{$employee->user->id}}/{{$employee->id}}"
                                       class="btn btn-danger" style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-trash" style="margin-right: 3px   "></i>Delete</a>
                                    <a href="/update/{{$employee->id}}"
                                       class="btn btn-success" style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-edit" style="margin-right: 3px" ></i>Update</a>
                                    @if($employee->user->Admin != 1)
                                    <a href='/makeAdmin/{{$employee->user->id}}' class='btn  btn-primary'
                                       style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-check" style="margin-right: 3px"></i>Make Admin</a>
                                    @endif
                                    @if($employee->status == 0)

                                        <a href="/disactive/{{$employee->id}}"
                                           style="margin-left:5px ;margin-bottom: 7px"
                                           class="btn Disactive btn-primary "><i class="fa fa-ban"
                                                                                 style="margin-left:5px "></i>

                                            DisActive</a>

                                    @else
                                        <a href='/active/{{$employee->id}}' class='btn  btn-warning'
                                           style="margin-left:5px ;margin-bottom: 7px; color:white"> <i class="fa fa-check"
                                        style="margin-right: 3px"></i>Active</a>

                                    @endif
                                    <a href="http://127.0.0.1:8000/api/emp/{{$employee->id}}"
                                       class="btn btn-info" style="margin-left:5px ;margin-bottom: 7px">
                                        <i class="fa fa-send" style="margin-right: 3px" ></i>Get Info</a>
                                </td>

                            @endif
                        </tr>
                        @endforeach

                </table>
            </div>




</div>
@endsection
