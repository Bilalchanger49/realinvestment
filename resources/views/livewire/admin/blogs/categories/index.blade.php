<div class="content-wrapper">
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1 class="mb-3">Blog Categories</h1>
           <a class="btn btn-primary mb-3" href="{{route('admin.category.create')}}">Create Category</a>
        </div>

        <div class="card card-default">
            <div class="container mt-4">
                <div>
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Name</th>
                            <th class="">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($categories as $category)
                            <tr>
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $category->name }}</td>
                                <td class="">
                                    <a wire:click="delete({{$category->id}})" class="btn btn-danger text-blue-500">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
