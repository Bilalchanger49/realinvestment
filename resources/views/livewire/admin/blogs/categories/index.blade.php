<div class="content-wrapper">
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1 class="mb-3">Blog Categories</h1>
            @can('category.create')
                <a class="btn btn-primary mb-3" href="{{route('admin.category.create')}}">Create Category</a>
            @endcan
        </div>

        <div class="card card-default">
            <div class="container mt-4">
                <div>
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Name</th>
                            @can('category.delete')
                                <th class="">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($categories as $category)
                            <tr>
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $category->name }}</td>
                                @can('category.delete')
                                    <td class="">
                                        <a wire:click="delete({{$category->id}})" class="btn btn-danger text-blue-500">delete</a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
