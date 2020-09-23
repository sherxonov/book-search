@extends('main.main')

@section('content')

    <div class="container">
        <a href="{{ route('folder.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
        <form method = "POST" action="{{ route('folder.update', $folder->id) }}"  enctype="multipart/form-data" class="mt-2">
            @csrf
            @method('put')
            <div class="form-group">
                <input type = "text" name="name" class="form-control" value="{{ $folder->name }}" >
            </div>
            <div class="form-group">
                <select name="niche_id" class="form-control">
                    <@foreach ($shelves as $index)
                        <optgroup label = "{{ $index->name }}">
                            @foreach ($index->niche as $niche)
                                <option value = "{{ $niche->id }}"> {{ $niche->name }} </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
        </form>




    </div>


@endsection
