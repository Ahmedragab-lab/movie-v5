<a href="{{ route('movies.show', $id) }}" class="btn btn-primary btn-sm" title="show"><i class="fa fa-eye"></i> Show</a>

{{-- @if (auth()->user()->hasPermission('delete_movies')) --}}
    <form action="{{ route('movies.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        {{-- <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button> --}}
        <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm delete" >
            <i class="fa fa-trash"></i>Delete
        </button>
        {{-- <button type="button" class="btn btn-info waves-effect waves-light btn-sm" id="confirm-btn-alert">Click me</button> --}}
    </form>
{{-- @endif --}}
