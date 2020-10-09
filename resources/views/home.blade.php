@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Personal Information') }}</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                    <form method="post" action="/updateStudent">
                        @csrf
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$user->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->firstname}}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="course_id">Course</label>
                            @if($user->course_id == 1)
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="1" selected>BSCS</option>
                                <option value="2">BSIT</option>
                                <option value="3">BSECE</option>
                                <option value="4">BSCOE</option>
                                <option value="5">BSEE</option>
                            </select>
                            @elseif($user->course_id == 2)
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="1">BSCS</option>
                                <option value="2" selected>BSIT</option>
                                <option value="3">BSECE</option>
                                <option value="4">BSCOE</option>
                                <option value="5">BSEE</option>
                            </select>
                            @elseif($user->course_id == 3)
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="1">BSCS</option>
                                <option value="2">BSIT</option>
                                <option value="3" selected>BSECE</option>
                                <option value="4">BSCOE</option>
                                <option value="5">BSEE</option>
                            </select>
                            @elseif($user->course_id == 4)
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="1">BSCS</option>
                                <option value="2">BSIT</option>
                                <option value="3">BSECE</option>
                                <option value="4" selected>BSCOE</option>
                                <option value="5">BSEE</option>
                            </select>
                            @elseif($user->course_id == 5)
                            <select class="form-control" id="course_id" name="course_id">
                                <option value="1">BSCS</option>
                                <option value="2">BSIT</option>
                                <option value="3">BSECE</option>
                                <option value="4">BSCOE</option>
                                <option value="5" selected>BSEE</option>
                            </select>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection