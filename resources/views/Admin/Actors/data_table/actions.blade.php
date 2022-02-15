{{-- @if (auth()->user()->hasPermission('delete_genres')) --}}
    <form action="{{ route('actors.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm delete" >
            <i class="fa fa-trash"></i>Delete
        </button>
    </form>
    <a href="{{ route('actors.index',['actor_id' => $id]) }}"  class="btn btn-success waves-effect waves-light btn-sm " >
        <i class="fa fa-info"></i> show Movie
    </a>
{{-- @endif --}}
