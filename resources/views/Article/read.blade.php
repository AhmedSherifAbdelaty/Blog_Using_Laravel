@extends('layouts.app')



@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h4>Post</h4>
        <div class="form-group">
            <label for="usr">Title:</label>
            {{$oneArticle->title}}
        </div>
        <div class="form-group">
            <label for="usr">body:</label>
            {{$oneArticle->body}}
        </div>

        <div class="form-group">

            <table class="table table-striped">
                <tr>
                    <td colspan="3" class="table table-info"> All comments</td>
                </tr>

                @foreach($oneArticle->comments as $c)
                    <tr>
                        <td>  {{$c->comment}} <p style="color:indianred">{{'commented by '. $c->user->name}}</p>
                        </td>
                        <td>
                            @can('edit', $c)
                            <a class="btn btn-info" href="{{'/editcomment/'.$c->id}}">Edit</a>
                            @endcan

                        </td>
                        <td>

                        @can('del', $c)
                                <a class="btn btn-danger" href="{{'/deletecomment/'.$c->id}}">Delete</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach

            </table>

            <form action="/read/{{$oneArticle->id}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea rows="4" cols="50"  name="comment" class="form-control">
      </textarea>
                </div>

                </br>
                <input type="submit" value="add comment" class="btn btn-primary"/>
            </form>
        </div>
    </div>
@endsection
