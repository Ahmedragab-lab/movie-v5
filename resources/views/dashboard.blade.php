@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">

            <!--Start Dashboard Content-->

            <div class="card mt-3 top-count">
                <div class="card-content">
                    <div class="row row-group m-0">
                        <div class="col-12 col-lg-6 col-xl-3 border-light">
                            <div class="card-body">
                                <div class="loader"></div>
                                <h5 class="text-white mb-0" style="display: none" id="genres-count"> <span
                                        class="float-right">
                                    </span></h5>
                                <i class="fa fa-list"></i>
                                {{-- <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div> --}}
                                {{-- <p class="mb-0 text-white small-font"> --}}

                                <a href="{{ route('genres.index') }}">Total Generes</a>
                                {{-- <span class="float-right">+4.2% --}}
                                {{-- <i class="zmdi zmdi-long-arrow-up"></i></span></p> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3 border-light">
                            <div class="card-body">
                                <div class="loader"></div>
                                <h5 class="text-white mb-0" style="display: none" id="movies-count"> <span
                                        class="float-right">
                                    </span></h5>
                                <i class="fa fa-film"></i>
                                {{-- <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div> --}}
                                {{-- <p class="mb-0 text-white small-font"> --}}
                                <a href="{{ route('movies.index') }}">Total Movie</a>
                                {{-- <span class="float-right">+1.2% <i --}}
                                {{-- class="zmdi zmdi-long-arrow-up"></i></span></p> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3 border-light">
                            <div class="card-body">
                                <div class="loader"></div>
                                <h5 class="text-white mb-0" style="display: none" id="actors-count"> <span
                                        class="float-right">
                                    </span></h5>
                                <i class="fa fa-address-book-o"></i>
                                {{-- <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div> --}}
                                {{-- <p class="mb-0 text-white small-font"> --}}
                                <a href="{{ route('actors.index') }}">Total Actor</a>
                                {{-- <span class="float-right">+5.2% <i --}}
                                {{-- class="zmdi zmdi-long-arrow-up"></i></span></p> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3 border-light">
                            <div class="card-body">
                                <h5 class="text-white mb-0">5630 <span class="float-right"><i
                                            class="fa fa-envira"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:55%"></div>
                                </div>
                                <p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i
                                            class="zmdi zmdi-long-arrow-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header text-uppercase">Movie Chart</div>
                        <div class="row row-group m-0">
                            <div class="col-12 col-lg-6 col-xl-3 border-light " style="margin:auto;">
                                <select name="" id="movies-chart-year" class="form-control mt-3 ">
                                    @for ($i = 5; $i >= 0; $i--)
                                        <option value="{{ now()->subyears($i)->year }}"
                                            {{ now()->subyears($i)->year == now()->year ? 'selected' : '' }}>
                                            {{ now()->subyears($i)->year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div id="movies-chart-wrapper">

                        </div>
                    </div>
                </div>
                <!--end row-->

                <!--End Dashboard Content-->
                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex my-2">
                                {{-- <h4 class="mb-0"> top popular</h4> --}}
                                <a href="{{ route('movies.index') }}"
                                class="mx-2 mt-1 btn btn-primary text-right"  style="margin:auto;">show all popular movie
                                </a>
                            </div>
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 30%;">title</th>
                                    <th>vote</th>
                                    <th>vote_count</th>
                                    <th>release_date</th>
                                </tr>

                                @foreach ($popularMovies as $index => $movie)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><a
                                                href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                                        </td>
                                        <td><i class="fa fa-star text-warning"></i> <span
                                                class="mx-2">{{ $movie->vote }}</span></td>
                                        <td>{{ $movie->vote_count }}</td>
                                        <td>{{ $movie->release_date }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <div class="d-flex my-2">
                                {{-- <h4 class="mb-0">top now_playing</h4> --}}
                                <a href="{{ route('movies.index', ['type' => 'now_playing']) }}"
                                    class="mx-2 mt-1 btn btn-primary">show all now playing</a>
                            </div>

                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 30%;">title</th>
                                    <th>vote</th>
                                    <th>vote_count</th>
                                    <th>release_date</th>
                                </tr>

                                @foreach ($nowPlayingMovies as $index => $movie)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><a
                                                href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                                        </td>
                                        <td><i class="fa fa-star text-warning"></i> <span
                                                class="mx-2">{{ $movie->vote }}</span></td>
                                        <td>{{ $movie->vote_count }}</td>
                                        <td>{{ $movie->release_date }}</td>
                                    </tr>
                                @endforeach
                            </table>

                            <hr>

                            <div class="d-flex my-2">
                                {{-- <h4 class="mb-0">top upcoming</h4> --}}
                                <a href="{{ route('movies.index', ['type' => 'upcoming']) }}"
                                    class="mx-2 mt-1 btn btn-primary">show all upcoming movie</a>
                            </div>

                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 30%;">title</th>
                                    <th>vote</th>
                                    <th>vote_count</th>
                                    <th>release_date</th>
                                </tr>

                                @foreach ($upcomingMovies as $index => $movie)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><a
                                                href="{{ route('movies.show', $movie->id) }}">{{ $movie->title }}</a>
                                        </td>
                                        <td><i class="fa fa-star text-warning"></i> <span
                                                class="mx-2">{{ $movie->vote }}</span></td>
                                        <td>{{ $movie->vote_count }}</td>
                                        <td>{{ $movie->release_date }}</td>
                                    </tr>
                                @endforeach
                            </table>


                        </div><!-- end of card body -->

                    </div><!-- end of card -->

                </div><!-- end of col -->

            </div><!-- end of row -->
            <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
    @endsection
    @push('js')
        <script>
            $(document).ready(function() {
                topCount();

                moviesChart("{{ now()->year }}");

                $('#movies-chart-year').on('change', function() {

                    let year = $(this).find(':selected').val();

                    moviesChart(year);

                }); //end of on change
            });

            function topCount() {
                $.ajax({
                    url: "{{ route('topcount') }}",
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $('.top-count .loader').hide();
                        $('.top-count #genres-count').show().html(data.genresCount);
                        $('.top-count #movies-count').show().html(data.moviesCount);
                        $('.top-count #actors-count').show().html(data.actorsCount);
                    }
                });
            }

            function moviesChart(year) {

                let loader = `
        <div class="d-flex justify-content-center align-items-center">
            <div class="loader "></div>
        </div>
        `;

                $('#movies-chart-wrapper').empty().append(loader);

                $.ajax({
                    url: "{{ route('movies_chart') }}",
                    data: {
                        'year': year,
                    },
                    cache: false,
                    success: function(html) {

                        $('#movies-chart-wrapper').empty().append(html);

                    },

                }); //end of ajax call

            }
        </script>
    @endpush
