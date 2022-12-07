@extends('layouts.front')
@section('activeBlog','active border-bottom-orange')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mb-3 ">
            <div class="text-center">
                @foreach ($article->categories as $category)
                    <a href="{{route('blogs.category',['category' => $category->slug])}}" class="badge text-secondary-orange text-decoration-none fw-bold">
                        {{$category->name}}
                    </a>
                @endforeach
            </div>
            <h1 class="display-3 fw-bold text-center my-4">{{$article->title}}</h1>
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card text-center border-0">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark m-0 p-0">
                                <h6 class="card-title fw-bold m-0 p-0">{{$article->user->name}}</h6>
                            </a>
                            <p class="card-text m-0 p-0">
                                {{$article->created_at->format("d F Y")}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <img src="{{asset('storage/assets/images/articles/'.$article->thumbnail)}}" alt="{{$article->title}}" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <p class="lead">
                {!!$article->content!!}
            </p>
            <hr class="border-bottom mt-5">
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            @foreach ($article->categories as $category)
                <a href="#" class="btn btn-outline-secondary">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

    <div class="row mb-4">
        <h3 class="fw-bold border-bottom py-3">Komentar</h3>
        @forelse ($comments as $comment)
            <div class="col-md-12">
                <div class="card mb-3 border-0 border-bottom" >
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{asset('assets/images/users/'.$comment->user->avatar) ? $comment->user->avatar : '-'}}" class="rounded-circle img-fluid mt-4 d-block mx-auto" alt="...">
                        </div>
                        <div class="col-md-10 g-0">
                            <div class="card-body">
                                <h5 class="card-title m-0">{{$comment->user->name}}</h5>
                                <small class="text-secondary">{{$comment->created_at->format("d F Y")}}</small>
                                <p class="mt-2 card-text lead">{{$comment->body}}</p>
                                @auth()
                                    <a href="#" class="text-secondary-orange" data-bs-toggle="modal" data-bs-target="#komentarModal{{$comment->id}}">Balas
                                        Komentar</a>
                                @endauth
                            </div>

                            <div class="row">
                                @foreach ($comment->replies as $reply)
                                    <div class="col-md-12">
                                        <div class="card mb-3 py-3 border-0 border-bottom">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="{{asset('assets/images/users/'.$reply->user->avatar) ? $reply->user->avatar : '-'}}"
                                                        class="rounded-circle img-fluid mt-4 d-block mx-auto">
                                                </div>
                                                <div class="col-md-10 g-0">
                                                    <div class="card-body">
                                                        <h5 class="card-title m-0">{{$reply->user->name}}</h5>
                                                        <small class="text-secondary">{{$reply->created_at->format("d F Y")}}</small>
                                                        <p class="mt-2 card-text lead">{{$reply->body}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="komentarModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Komentar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('comments.reply',['article' => $comment->article->slug, 'comment' => $comment->id])}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="body" class="form-label">Komentar</label>
                                    <textarea name="body" id="body" cols="30" rows="10" class="form-control form-control-lg"
                                        placeholder="Masukkan Komentar">{{old('body')}}</textarea>
                                    @error('body')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Komentar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="alert alert-info">Tidak ada komentar</div>
            </div>
        @endforelse
        <div class="col-md-2"></div>

    </div>
</div>


<div class="container p-5 mb-5 bg-dark rounded">
    <div class="row">
        <div class="col-md-12 text-white ">
            <h2 class="fw-bold">Tinggalkan komentar di postingan</h2>
            @if (auth()->user())
                <form action="{{route('comments.store',['article' => $article->slug])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control form-control-lg" placeholder="Masukkan Komentar">{{old('body')}}</textarea>
                        @error('body')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #D66853">Komentar</button>
                </form>
            @else
                <p>Silahkan <a href="{{route('login')}}" class="text-secondary-orange text-decoration-none fw-bold">Login</a> terlebih dahulu untuk menambahkan komentar</p>
            @endif
        </div>
    </div>
</div>
@endsection
