@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mt-4">Projects Technologies</h1>
    <a class="btn btn-success my-3" href="{{route('admin.technologies.create')}}">Create Type</a>
    <table class="table w-75">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($techs as $tech)
            <tr>
                <th class="py-4 col-1" scope="row">{{$tech->id}}</th>
                <td class="py-4 col-2 text-center"><span class="badge " style="background-color:{{$tech->color}};">{{$tech->name}}</span></td>
                <td class="">
                    <div class="d-flex my-3  justify-content-center">
                        <a href="{{route('admin.technologies.edit', $tech->id)}}" class="btn btn-warning me-2 text-light px-4"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{route('admin.technologies.destroy', $tech->id)}}" class="mx3" method="POST">
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