@extends('layouts.app')

@section('content')
<div class="container">

    <form  action="/update/{{$employ->user->id}}/{{$employ->id}}" method="post" class="Add-Form" style="margin: 20px ; padding:30px ; background-color:#fff2c2; border:2px solid #fff2c2" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="userName" value="{{$employ->user->name}}" class="form-control col-sm-5" name="user" required="required">
        <input type="text" placeholder="firstName"     value=" {{$employ->firstName}}" class="form-control col-sm-5" required="required" name="firstname">
        <input type="text" placeholder="lastName" value=" {{$employ->lastName}}" class="form-control col-sm-5" required="required" name="lastname">
        <input type="email" placeholder="Email" value=" {{$employ->user->email}}" class="form-control col-sm-5" required="required" name="email">
        <input type="password" placeholder="Password" class="form-control col-sm-5" required="required" name="password">
        <input type="text" placeholder="Job Title" value=" {{$employ->jobTitle}}" class="form-control col-sm-5" required="required" name="job">
<select name="status" class="form-control col-sm-5" >

            @if(isset($employ->status) && $employ->status == 1 )
                <option value="1">Active</option>
                <option value="0">DisActive</option>
            @elseif(isset($employ->status)&& $employ->status == 0)
                <option value="0">DisActive</option>
                <option value="1">Active</option>
            @else
                <option value="1">Active</option>
                <option value="0">DisActive</option>
             @endif

        </select>
            Add Image
{{--        @if(isset($employ->image))<img src ="{{ Storage::url($employ->image)}}" width="50" height="50"/>@endif--}}
        <input type="file" name="photo" >

        <input type="text" placeholder="location" class="form-control col-sm-5" name="location">

        

        <button type="submit" class="btn btn-success" style="margin-bottom: 10px; color:white">
             <i class="fa fa-plus"></i> Add
          </button>


    </form>


</div>
@endsection
