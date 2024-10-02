
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="container mt-4">
                    <h1>Property</h1>

{{--                    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-5">Add New Course</a>--}}

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>price</th>
                            <th>Thumbnail</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @foreach($courses as $course)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $course->title }}</td>--}}
{{--                                <td>{{ $course->description }}</td>--}}
{{--                                <td>--}}
{{--                                    @php--}}
{{--                                        $hours = floor($course->duration / 60);--}}
{{--                                        $minutes = $course->duration % 60;--}}
{{--                                    @endphp--}}
{{--                                    {{ $hours }}h {{ $minutes }}m--}}
{{--                                </td>--}}
{{--                                <td>${{ $course->price }}</td>--}}
{{--                                <td>{{ $course->category }}</td>--}}
{{--                                --}}{{--                <td>{{ $course->thumbnail }}</td>--}}
{{--                                <td><img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Course Thumbnail"--}}
{{--                                         width="100"></td>--}}
{{--                                <td>--}}
{{--                                    <button class="btn btn-danger">--}}
{{--                                        <a  href="{{route('courses.destroy', $course->id)}}" class="text-decoration-none text-light">--}}
{{--                                            <i class="icon-trash"></i> Delete--}}
{{--                                        </a>--}}
{{--                                    </button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--@endsection--}}
