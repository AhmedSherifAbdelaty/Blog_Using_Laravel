
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


    <h1> Add Article </h1>
    <table class="">
        <form  method="post"  >
            {{csrf_field()}}

            <br>
            <tr>
                <th>Title:</th>
                <td>
                    <input type="text"   name="title" style="width:1000px;" value="{{Request::old('title')}}" class="form-control" placeholder="enter product name">
                </td>
            </tr>

            <tr>

                <td><br></td>

            </tr>

            <tr>
                <th>Body:</th>
                <td>

                    <textarea rows="4" cols="50"  name="body"  class="form-control">

                    </textarea>

                </td>
            </tr>

            <tr>

            <td><br></td>
            </tr>



            <tr>
                <td><label></label></td>
                <td><input type="submit" class="btn btn-primary" value="Add article"></td>
            </tr>
        </form>
    </table>

@endsection
