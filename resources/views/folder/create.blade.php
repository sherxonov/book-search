@extends('main.main')

@section('content')
    <div class="container">
        <a href="{{ route('folder.index') }}" class="btn btn-outline-warning"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
            <form method = "POST" action="{{ route('folder.store') }}"  enctype="multipart/form-data" class="mt-2">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name:" class="form-control">
                </div>

                <div class="form-group">
                    <select class="form-control" name="niche_id">
                        <@foreach ($shelves as $shelf)
                            <optgroup label = "{{ $shelf->name }}">
                                @foreach ($shelf->niche as $niche)
                                    <option value = "{{ $niche->id }}"> {{ $niche->name }} </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Save">
            </form>
    </div>
@endsection
