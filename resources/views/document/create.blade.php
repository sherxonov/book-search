@extends('main.main')

@section('content')
<div class="container">
    <a href="{{ route('document.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
    <form method = "POST" action="{{ route('document.store') }}" enctype="multipart/form-data" class="mt-2">
    @csrf
       <div class="form-group">
            <label>Choose the file:</label>
            <input type="file" name="file" placeholder="File:" class="form-control">
        </div>
      

        <div class="form-group mt-2">
            <select name="folder_id" class="form-control">
                @foreach ($shelves as $shelf)
                     @foreach ($shelf->niche as $niche)
                        <optgroup label = "{{ $shelf->name }}:     {{ $niche->name }}">
                                @foreach ($niche->folder as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </optgroup>
                     @endforeach

                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Save">
    </form>
</div>
@endsection
