@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">My Projects</h1>
    <a class="btn btn-success my-3" href="{{route('admin.types.create')}}">Create Type</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <th scope="row">{{$type->id}}</th>
                <td><span class="badge " style="background-color:{{$type->color}};">{{$type->type}}</span></td>
                <td class="col-4">
                    <div class="d-flex my-3  justify-content-around align-items-end w-50">
                        <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-warning text-light px-4"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{route('admin.types.destroy', $type->id)}}" class="mx3" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger  px-4"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection