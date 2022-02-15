@extends('layouts.master')
@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Data Tables</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
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
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <select name="genre_id" id="genre" class="form-control select2">
                        <option value=""> --- All section ---</option>
                        @foreach ($genres as $genre)
                           <option value="{{ $genre->id }}" {{ $genre->id == request()->genre_id ? 'selected':''}}>
                              {{ $genre->name }}
                           </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-film"></i> Movies List</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="movies-table" class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Poster</th>
                                        <th>Title</th>
                                        <th>Section</th>
                                        <th>Vote</th>
                                        <th>Vote Count</th>
                                        <th>Release Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($movies as $index=>$movie )
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ $movie['poster_path'] }}" alt="" width="150">
                                        </td>
                                        <td>{{ Str::limit($movie['title'],20) }}</td>
                                        <td>
                                            @foreach ($movie->genres as $genre)
                                            <h6><span class="padge badge-warning">{{ $genre->name }}</span></h6>
                                            @endforeach
                                        </td>
                                        <td>{{ $movie['release_date'] }}</td>
                                        <td><i class="fa fa-star text-warning"></i> {{ $movie['vote'] }}</td>
                                        <td>{{ $movie['vote_count'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody> --}}

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->
@endsection
@push('js')
    <script>
        let genre = "{{ request()->genre_id }}";
        // let genre ;


        let moviesTable = $('#movies-table').DataTable({
            // dom: "tiplr",
            serverSide: true,
            processing: true,
            // "language": {
            //     "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            // },
            ajax: {
                url: '{{ route('movies.data') }}',
                data: function (d) {
                    d.genre_id = genre;
                    // d.actor_id = actor;
                    // d.type = type;
                }
            },
            columns: [
                {data: 'poster', name: 'poster', searchable: false, sortable: false, width: '10%'},
                {data: 'title', name: 'title', width: '10%'},
                {data: 'genres', name: 'genres', searchable: false},
                {data: 'vote', name: 'vote', searchable: false},
                {data: 'vote_count', name: 'vote_count', searchable: false},
                {data: 'release_date', name: 'release_date', searchable: false},
                // {data: 'favorite_by_users_count', name: 'favorite_by_users_count', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[4, 'desc']],
        });

        // $('#data-table-search').keyup(function () {
        //     genresTable.search(this.value).draw();
        // })

        $('#genre').on('change', function () {
            genre = this.value;
            moviesTable.ajax.reload();
        })
    </script>
@endpush
