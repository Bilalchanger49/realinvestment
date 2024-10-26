
    <div class="content-wrapper">
        <div class="content">
            <h1 class="mb-3">Property</h1>
            <div class="card card-default">
                <div class="container mt-4">
{{--                    <h1>Property</h1>--}}
{{--                    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-5">Add New Course</a>--}}

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Registeration no</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Rent</th>
                            <th>Share Price</th>
                            <th>Remaining Share</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->property_name }}</td>
                                <td>{{ $property->property_description }}</td>
                                <td>{{ $property->property_reg_no }}</td>
                                <td>{{ $property->property_address }}</td>
                                <td>{{ $property->property_price }}</td>
                                <td>{{ $property->property_rent }}</td>
                                <td>{{ $property->property_share_price }}</td>
                                <td>{{ $property->property_remaining_shares }}</td>
                                <td><img src="{{ asset('storage/' . $property->property_image) }}" alt="Course Thumbnail"
                                         width="100"></td>
                                <td>
{{--                                    <button class="btn btn-danger">--}}
{{--                                        <a  href="{{route('courses.destroy', $property->id)}}" class="text-decoration-none text-light">--}}
{{--                                            <i class="icon-trash"></i> Delete--}}
{{--                                        </a>--}}
{{--                                    </button>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
