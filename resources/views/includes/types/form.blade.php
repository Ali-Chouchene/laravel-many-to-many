@if($type->exists)
<form class="w-75" action="{{ route('admin.types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form class="w-75" action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="mb-3 w-50">
            <label for="type" class="form-label">Type Name</label>
            <input required type="text" maxlength="60" class="form-control" id="type" aria-describedby="type" name="type" value="{{ old('type', $type->type) }}">
            <div id="type" class="form-text">Here you can wrigth the type name</div>
        </div>
        <div class="mb-3 row align-items-center">
            <div class="col-8">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color">
                <div class="form-text">Here you can add the project type color</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-3">Save</button>
    </form>
    </div>

    <script>

    </script>