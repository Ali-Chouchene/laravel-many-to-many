@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">My Projects</h1>
    <a class="btn btn-success my-3" href="{{route('admin.projects.create')}}">Create Project</a>
    @foreach($projects as $project)
    <div class=" d-flex flex-column align-items-center">
        <div class="card d-flex flex-column align-items-center  text-center">
            <img src="{{asset('storage/' . $project->image)}}" class="card-img-top img-fluid" alt="{{$project->name}}">
            <div class="card-body">
                <h2 class="card-title">{{$project->name}}</h2>
                <!-- <p class="card-text">{{$project->description}}</p> -->
                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary my-3 px-4"><i class="fa-solid fa-eye fa-xl"></i></a>
            </div>
            <div>
                <h6>
                    {{$project->status ? 'Public' : 'Private'}}
                </h6>
            </div>
        </div>
    </div>
    @endforeach
    <hr>
    <div class="d-flex justify-content-center align-items-center my-5">
        @if($projects->hasPages())
        {{$projects->links()}}
        @endif
    </div>
</div>

@endsection