@extends('layouts.app')
@section('content')
<div id="welcome" class="d-flex justify-content-between align-items-center vh-70">
    <div class="d-flex flex-column gap-4 bg-light py-5 px-3 align-self-center">
        <a href="https://github.com/Ali-Chouchene"><i class="fa-brands fa-github fa-2xl "></i></a>
        <a href="#"><i class="fa-brands fa-linkedin fa-2xl "></i></a>
    </div>
    <div class="text-center">
        <h1>
            HI, I'M ALI CHOUCHENE
        </h1>
        <h3 class="my-3">
            A JR. Web Developer .....
        </h3>
        <a class="btn btn-blue mt-4" href="{{route('admin.projects.index') }}"><strong>PROJECTS</strong></a>
    </div>
    <div></div>
</div>

@endsection