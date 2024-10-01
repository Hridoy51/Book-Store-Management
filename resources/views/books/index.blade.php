@extends('layout')
@section('page-content')
<p class="text-end"><a text="end" class="btn btn-primary" href="{{route('books.create')}}">New Book</a></p>
<table class="table table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Details</th>
        <th>Delete</th>
    </tr>
    @foreach ($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td><a class="btn btn-outline-info" href="{{route('books.show', $book->id)}}">Details</a></td>
            <td><form method="post" action="{{route('books.destroy', $book->id)}}" onsubmit="return confirm('Sure?')">
                @csrf
                @method('Delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form></td>
        </tr>

    @endforeach
</table>
{{$books->links()}}
@endsection