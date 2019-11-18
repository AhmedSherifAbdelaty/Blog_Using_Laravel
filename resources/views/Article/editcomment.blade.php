
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

    <h1> Edit Comment </h1>
    <table class="">
        <form action="{{"/updatecomment/".$comment->id}}" method="post"  >
            {{csrf_field()}}

            <br>
            <tr>
                <th>Title:</th>
                <td>
                    <input type="text"   name="comment" style="width:1000px;" value="{{$comment->comment}}" class="form-control" placeholder="">
                </td>
            </tr>

            <tr>

                <td><br></td>

            </tr>

            <tr>

                <td><br></td>
            </tr>


            <tr>
                <td><label></label></td>
                <td><input type="submit" class="btn btn-dark" value="Edit comment"></td>
            </tr>
        </form>
    </table>

@endsection
