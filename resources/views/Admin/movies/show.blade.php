@extends('layouts.master')
@section('css')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Movies</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('movies.index') }}">Movies</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $movie->title }}</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <button type="button" class="btn btn-light waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                        Setting</button>
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="javaScript:void();" class="dropdown-item">Action</a>
                        <a href="javaScript:void();" class="dropdown-item">Another action</a>
                        <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                    </div>
                </div>
            </div>
        </div>

{{-- ////////////////////// --}}

<div class="row">

    <div class="col-md-12">

        <div class="tile shadow">

            <div class="row">
                <div class="col-md-2">
                    <img src="{{ $movie->poster_path }}" class="img-fluid" alt="">
                </div>

                <div class="col-md-10">
                    <h2>{{ $movie->title }}</h2>

                    @foreach ($movie->genres as $genre)
                        <h5 class="d-inline-block"><span class="badge badge-primary">{{ $genre->name }}</span></h5>
                    @endforeach

                    <p style="font-size: 16px;">{{ $movie->description }}</p>

                    <div class="d-flex mb-2">
                        <i class="fa fa-star text-warning" style="font-size: 35px;"></i>
                        <h3 class="m-0 mx-2">{{ $movie->vote }}</h3>
                        <p class="m-0 align-self-center">{{ __('by') }} {{ $movie->vote_count }}</p>
                    </div>

                    <p><span class="font-weight-bold">{{ __('language') }}</span>: en</p>
                    <p><span class="font-weight-bold">{{ __('release_date') }}</span>: {{ $movie->release_date }}</p>

                    <hr>

                    <div class="row" id="movie-images">

                        @foreach ($movie->images as $image)

                            <div class="col-md-3 my-2">
                                <a href="{{ $image->image_path }}"><img src="{{ $image->image_path }}" class="img-fluid" alt=""></a>
                            </div><!-- end of col -->
                        @endforeach

                    </div><!-- end of row -->

                    <hr>

                    <div class="row">

                        @foreach ($movie->actors as $actor)

                            <div class="col-md-2 my-2">
                                <a href="{{ route('movies.index', ['actor_id' => $actor->id]) }}">
                                    <img src="{{ $actor->image_path }}" class="img-fluid" alt="">
                                </a>
                            </div><!-- end of col -->

                        @endforeach

                    </div><!-- end of row -->

                </div><!-- end of col  -->

            </div><!-- end of row -->

        </div><!-- end of tile -->

    </div><!-- end of col -->

</div><!-- end of row -->
{{-- ////////////////////// --}}




        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->
@endsection
@push('js')

@endpush
