
@extends('layouts.app')

@section('content')

    <div class="container">

        <table class="table table-hover">
            <tr>
                <th>Title </th>
                <td>Action</td>
            </tr>

            @foreach( $allArticles as $article)

                <tr>

                    <td>
                        <a href="{{ "/read/".$article->id }}" >{{$article->title}}</a>
                        <p  >{{'posted by '. $article->user->name}}</p>
                    </td>

                    <td>
                        @can('update', $article)
                            <a class="btn btn-primary" href="{{"/edit/".$article->id}}">Update</a> |
                        @endcan

                            @can('delete', $article)
                            <a class="btn btn-danger" href="{{"/delete/".$article->id}}">Delete</a>
                            @endcan

                    </td>
                </tr>

            @endforeach
        </table>


<a href="add" class="btn btn-success"> Add Article</a>

    </div>

@endsection
