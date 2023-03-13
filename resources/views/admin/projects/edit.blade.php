@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <h1 class="my-5">Edit Project</h1>
    </div>
    @include('includes.projects.form')
</div>
@endsection
<script>
    const placeholder = 'project/AfqRHPmTchC3tIJmSb634zwjXuVFQQKqRBXR7e31.png';

    const imageInput = document.getElementById("image");
    const imageOutput = document.getElementById('output_img');

    imageInput.addEventListener('change', () => {
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.readAsDataURL(imageInput.files[0]);
            reader.onload = e => {
                imageOutput.setAttribute('src', e.target.result);
            }
        } else imageOutput.src = placeholder;
    });
</script>