@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">{{$project->name}}</h1>
    <div class=" d-flex  justify-content-center">
        <div class="card d-flex flex-column align-items-center my-1" style="width: 80%;">
            <div>
                <div class="">
                    <img src="{{asset('storage/' . $project->image)}}" class="card-img-top img-fluid" alt="{{$project->name}}">
                    <h4 class="card-text my-4 text-center px-5">{{$project->description}}</h4>
                </div>
                <div class="text-center my-3">
                    <h3>More Here</h3>
                    <a href="{{$project->link}}">
                        <i class="fa-brands fa-github fa-2xl "></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-center my-3">
                    Project Details
                </h3>
                <p><strong>Category:</strong> {{$project->type?->type}} - <strong>Created At:</strong> {{$project->created_at}} - <strong>Project Status:</strong> {{$project->status ? 'Public' : 'Private'}}</p>
            </div>
            <div class="w-100 d-flex flex-column align-items-center">
                <div class="">
                    <h3 class="text-center my-3">
                        Technologies Details
                    </h3>
                </div>

                <div class="d-flex justify-content-around w-50 my-4">
                    @foreach($project->technologies as $tech)
                    <h5><span class="badge" style="background-color:{{$tech->color}};">{{$tech->name}}</span></h5>
                    @endforeach
                </div>


            </div>
            <div class="d-flex my-3  justify-content-around align-items-end w-50">
                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning text-light px-4"><i class="fa-solid fa-pen-to-square fa-xl me-2"></i>Edit</a>
                <form action="{{route('admin.projects.destroy', $project->id)}}" class="mx3" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger  px-4"><i class="fa-solid fa-trash fa-xl  me-2"></i>Delete</button>
                </form>
                <a href="{{route('admin.projects.index', $project->id)}}" class="btn btn-secondary px-4 "><i class="fa-solid fa-arrow-left fa-xl  me-2"></i>Return</a>
            </div>
        </div>
    </div>

</div>

@endsection