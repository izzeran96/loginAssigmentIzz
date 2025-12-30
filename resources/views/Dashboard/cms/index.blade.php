@extends('layouts.dashboard')

@section('content')

    <div class="card">
        <div class="card-body">
            <a href="{{ route('cms.post') }}" class="btn btn-primary">Create A Contents</a>
            <table class="table">
                <tr>
                    <th>Post By</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
               @foreach ($cmsContent as $content)
                 <tr>
                    <td>{{$content->user->name}}
                         <br>
                      {{ $content->created_at->diffForHumans() }}
                    </td>
                    <td>{{$content->title}}</td>
                    <td>
                        {{$content->content}}

                    </td>
                    <td><a class="btn btn-primary" href="{{ route('cms.edit', [
                        Str::slug($content->title),
                        $content->id
                    ]) }}">Edit</td>
                </tr>
               @endforeach
            </table>
        </div>
    </div>
@endsection
