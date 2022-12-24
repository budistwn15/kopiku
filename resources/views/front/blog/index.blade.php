@extends('layouts.front')
@section('activeBlog','active border-bottom-orange')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mb-5 text-center">
            <h2 class="fw-bold display-5"><span class="text-secondary-orange">Artikel</span> Harian Kopiku</h2>
            <p>Apa yang bisa lebih mewah dari sofa, buku, dan secangkir kopi</p>
        </div>
            <div class="col-md-12 mb-3">
                @foreach ($articles as $article)

                    <div class="card mb-5 border-0 shadow-sm rounded">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('storage/assets/images/articles/'.$article->thumbnail)}}" class="img-fluid h-100 rounded" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    @foreach ($article->categories as $category)
                                        <a href="{{route('blogs.category',['category' => $category->slug])}}" class="badge text-decoration-none text-bg-primary btn-sm mb-3">{{$category->name}}</a>
                                    @endforeach
                                    <a href="{{route('blogs.show',['article' => $article->slug])}}" class="text-decoration-none text-dark">
                                        <h3 class="card-title fw-bold">{{$article->title}}</h3>
                                    </a>
                                    <p class="card-text">
                                        {!!substr($article->content,0,1000)!!} ...
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text"><small class="text-muted">{{$article->user->name}}</small></p>
                                        <p class="card-text"><small class="text-muted">Last updated {{$article->created_at->diffForHumans()}}</small></p>
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
@endsection

