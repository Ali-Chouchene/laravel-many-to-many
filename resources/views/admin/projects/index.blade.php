@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">My Projects</h1>
    <a class="btn btn-success" href="{{route('admin.projects.create')}}">Create Project</a>
    @foreach($projects as $project)
    <div class=" d-flex flex-column align-items-center">
        <div class="card d-flex flex-column align-items-center my-3 p-5 text-center" style="width: 60%;">
            <img src="{{asset('storage/' . $project->image)}}" class="card-img-top img-fluid" alt="{{$project->name}}" style="width: 90%; height: 30rem;">
            <div class="card-body">
                <h5 class="card-title">{{$project->name}}</h5>
                <!-- <p class="card-text">{{$project->description}}</p> -->
                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary my-3 px-4"><i class="fa-solid fa-eye fa-xl"></i></a>
            </div>
            <div>
                <h5>
                    {{$project->status ? 'Public' : 'Private'}}
                </h5>
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