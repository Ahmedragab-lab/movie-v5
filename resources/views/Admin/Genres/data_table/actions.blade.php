{{-- @if (auth()->user()->hasPermission('delete_genres')) --}}
    <form action="{{ route('genres.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm delete" >
            <i class="fa fa-trash"></i>Delete
        </button>
    </form>
{{-- @endif --}}
