@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Student Info') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <label type="text" class="form-control" id="id" name="id">{{$user->id}}</label>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <label type="text" class="form-control" id="firstname" name="firstname">{{$user->firstname}}</label>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <label class="form-control" id="lastname" name="lastname">{{ $user->lastname }}</label>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <label type="email" class="form-control" id="email" name="email">{{ $user->email}}</label>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Course</label>
                        <label class="form-control" id="course_id">
                        @if($user->course_id == 1)
                        BSCS
                        @elseif($user->course_id == 2)
                        BSIT
                        @elseif($user->course_id == 3)
                        BSEC
                        @elseif($user->course_id == 4)
                        BSCOE
                        @else
                        BSEE
                        @endif
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection