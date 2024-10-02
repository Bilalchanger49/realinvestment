@extends('layouts.auth')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Pending</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
{{--                                                                       <a class="dropdown-item" href="{{ route('error-home') }}?status=pending">More details</a>--}}
                                </div>
                            </div>
                            <div class="sub-title">
{{--                                                                <span class="mx-1">{{ $pending }}</span>--}}
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>In Progress</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
{{--                                                                        <a class="dropdown-item" href="{{ route('error-home') }}?status=in-progress">More details</a>--}}
                                </div>
                            </div>
                            <div class="sub-title">
{{--                                                                <span class="mx-1">{{ $inprogress }}</span>--}}
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Completed</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
{{--                                                                        <a class="dropdown-item" href="{{ route('error-home') }}?status=completed">More details</a>--}}
                                </div>
                            </div>
                            <div class="sub-title">
{{--                                                                <span class="mx-1">{{ $completed }}</span>--}}
                                <i class="mdi mdi-arrow-up-bold text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

