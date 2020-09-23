@extends('main.main')

@section('content')

<div class="container">
    <a href="{{ route('folder.index') }}" class="btn btn-outline-warning mb-2"><i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i></a>
    <table class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
                <th scope="col">Folder</th>
                <th scope="col">Niche</th>
                <th scope="col">Shelf</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($folder->document as $counter=>$index)

                <tr>
                    <td>{{ ++$counter }}</td>
                    <td>{{ $index->name }}</td>
                    <td>@if(!empty($index->folder)) {{ $index->folder->name }} @endif</td>
                    <td>@if(!empty($index->folder->niche)) {{ $index->folder->niche->name }} @endif</td>
                    <td>@if(!empty($index->folder->niche->shelf)) {{ $index->folder->niche->shelf->name }} @endif</td>
                    <td><a href="{{ route('document.edit', $index->id) }}" class="btn btn-outline-success"><i class="fa fa-pencil"></i> Edit</a></td>
                    <td>
                        <form action="{{ route('document.destroy', $index->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection
