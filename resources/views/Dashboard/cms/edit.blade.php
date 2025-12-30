@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('cms.updatePost', $content->id) }}" method="post" class="form">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $content->title }}" id="">
        </div>
        <br>
         <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control" value="{{ $content->tags }}" id="">
        </div>
        <br>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10">{{$content->content}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Update A content">
    </form>
@endsection
