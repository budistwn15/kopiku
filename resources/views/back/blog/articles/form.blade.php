<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Masukkan Judul" value="{{old('title') ?? $article->title}}">
    @error('title')
        <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="content">Konten</label>
    <textarea name="content" id="summernote" class="form-control form-control-lg">{{old('content') ?? $article->content}}</textarea>
    @error('content')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="categories" class="form-label">Kategori</label>
    <div class="form-group">
        @foreach ($categories as $category)
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" name="categories[]" type="checkbox" id="{{$category->id}}" value="{{$category->id}}" {{$article->categories()->find($category->id) ? 'checked' : ''}}>
            <label class="form-check-label" for="{{$category->id}}">{{$category->name}}</label>
        </div>
        @endforeach
    </div>
    <div class="form text">Tidak ada kategori? <a href="{{route('categories.index')}}" class="text-danger">Tambah Kategori</a></div>
    @error('categories')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
</div>
<div class="mb-3">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <div class="form-group">
        @if ($article->thumbnail)
            <img src="{{asset('storage/assets/images/articles/'.$article->thumbnail)}}" class="img-fluid" width="150">
        @endif
    </div>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-lg">
    <div class="form-text">* Maksimal 5MB</div>
    <div class="form-text">* Format gambar [png, jpg]</div>
    @error('thumbnail')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
