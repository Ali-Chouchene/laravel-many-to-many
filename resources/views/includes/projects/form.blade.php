@if($project->exists)
<form class="w-75" action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @else
    <form class="w-75" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="mb-3 w-50">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" maxlength="60" class="form-control" id="name" aria-describedby="name" name="name" value="{{ old('name', $project->name) }}">
            <div id="name" class="form-text">Here you can wrigth the project name</div>
        </div>
        <div class="mb-3 row align-items-center">
            <div class="col-8">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="form-text">Here you can add the project image</div>
            </div>
            <div class="col-4">
                <div class="d-flex pt-3 justify-content-center">
                    <img id="output_img" src="{{$project->image ? asset('storage/' . $project->image) : asset('storage/' . 'project/AfqRHPmTchC3tIJmSb634zwjXuVFQQKqRBXR7e31.png') }}" class="img-fluid square" alt="">
                </div>
            </div>

        </div>
        <div class="mb-3 w-50">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $project->link) }}">
            <div id="link" class="form-text">Here you can wrigth the project link</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea minlength="30" class="form-control" id="description" rows="5" name="description">{{old('description', $project->description)}}</textarea>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="type" class="form-label">Project Type</label>
                <select class="form-select" aria-label="type" name="type_id" id="type">
                    <option value="">Without Type</option>
                    @foreach($types as $type)
                    <option @if( old('type_id' , $project->type_id) == $type->id) selected @endif value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center ">
                <div class="form-check form-switch">
                    <input class="form-check-input px-4 py-2" type="checkbox" role="switch" id="status" name="status" @if(old('status' , $project->status)) checked @endif>
                    <label class="form-check-label ms-3" for="status">Public</label>
                </div>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center ">
                @foreach($techs as $tech)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tech-{{$loop->iteration}}" value="{{$tech->id}}" name="techs[]" @if(in_array($tech->id, old('techs', $project_techs ?? []))) checked @endif>
                    <label class="form-check-label" for="tech-{{$loop->iteration}}">{{$tech->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">Save</button>

    </form>
    </div>

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