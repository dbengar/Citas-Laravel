@extends('layouts.main')

@section('content')

<div class="container-lg" style="margin: 0 auto;">
    <div class="row mt-5">

    @foreach($departments as $department)
            <div class="col-lg-4 col-md-4 col-sm-12 text-center mb-3 mx-5">
                <div class="card" style="width: 28rem;">
                    <img src="{{$department->image}}" style="with:200px"/>
                    <div class="card-body">
                        <div class="card-title">{{$department->name}}</div>
                        <div class="card-text">{{$department->description}}</div>

                        <form method="post" action="{{route('showAppointments')}}">
                            @csrf
                            <input type="text" name="department_id" value="{{$department->id}}" style="display:none"/>
                            <input type="submit" value="show appointments" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>

@endsection