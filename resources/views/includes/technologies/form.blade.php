@if($tech->exists)
<form class="w-75" action="{{ route('admin.technologies.update', $tech->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form class="w-75" action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="mb-3 w-50">
            <label for="tech" class="form-label">Technology Name</label>
            <input type="text" class="form-control" id="tech" aria-describedby="tech" name="name" value="{{ old('name', $tech->name) }}">
            <div id="tech" class="form-text">Here you can wrigth the technology name</div>
        </div>
        <div class="mb-3 row align-items-center">
            <div class="col-8">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color">
                <div class="form-text">Here you can add the technology label color</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-3">Save</button>
    </form>
    </div>

    <script>

    </script>