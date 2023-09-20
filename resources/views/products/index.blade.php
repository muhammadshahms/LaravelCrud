@include('template.header')

<div class="container-fluid">
    <h1>Products</h1>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="">
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="images/{{ $product->image }}" alt="{{ $product->name }}" class="rounded-circle"
                                width="50" height="50"></td>
                        <td>
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                            <a href="/products/{{ $product->id }}/delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
    </div>
    </tbody>
    </table>
</div>
</div>

@include('template.footer')
