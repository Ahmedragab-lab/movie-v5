@extends('layouts.master')
@section('css')
    <!-- CSRF Token -->
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
                        <button type="button"
                            class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                            data-toggle="dropdown">
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i> All Genres</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <table id="default-datatable" class="table table-bordered"> --}}
                                <table  class="table table-bordered datatable"  id="genres-table" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>Name</th>
                                            <th>Movie Count</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($genres as $index=>$genre )
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $genre->name }}</td>
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
        let genresTable = $('#genres-table').DataTable({
            // dom: "tiplr",
            serverSide: true,
            processing: true,
            // "language": {
            //     "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            // },
            ajax: {
                url: '{{ route('genres.data') }}',
            },
            columns: [
                // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'name', name: 'name'},
                {data: 'movies_count', name: 'movies_count', searchable: false},
                // {data: 'related_movies', name: 'related_movies', searchable: false, sortable: false},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            // order: [[4, 'desc']],
            // drawCallback: function (settings) {
            //     $('.record__select').prop('checked', false);
            //     $('#record__select-all').prop('checked', false);
            //     $('#record-ids').val();
            //     $('#bulk-delete').attr('disabled', true);
            // }
        });

        // $('#data-table-search').keyup(function () {
        //     genresTable.search(this.value).draw();
        // })
    </script>
@endpush
