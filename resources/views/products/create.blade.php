@include('template.header')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>

    </div>
@endif
<main>

    <div class="container">
        <form class="mt-3" method="POST" action="/products/store" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 row">
                <label for="name" class="col-4 col-form-label">Product name</label>
                <div class="col-6">
                    <input type="text" class="form-control mb-4" name="name" id="name"
                        placeholder="Product name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <label for="description" class="col-4 col-form-label">Description</label>
                <div class="col-6">
                    <label for="" class="form-label"></label>
                    <textarea class="form-control mb-4" name="description" id="description" rows="3" placeholder="description">{{ old('description') }}</textarea>
                </div>
                <label for="Image" class="col-4 col-form-label">Image</label>
                <div class="col-6">
                    <input type="file" class="form-control mb-2" name="image" id="Image" placeholder="Image"
                        value="{{ old('image') }}">
                    @if ($errors->has('image'))
                        <span class="text-danger">
                            {{ $errors->first('image') }}
                        </span>
                    @endif
                </div>

            </div>
            <div class="row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </form>
    </div>
</main>
