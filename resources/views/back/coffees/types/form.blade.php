<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Tipe" value="{{old('name') ?? $type->name}}">
    @error('name')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control form-control-lg" placeholder="Masukkan Deskripsi">{{old('description') ?? $type->description}}</textarea>
    @error('description')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <div class="form-group">
        @if ($type->thumbnail)
        <img src="{{asset('storage/assets/images/types/'.$type->thumbnail)}}" class="img-fluid" width="150">
        @endif
    </div>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-lg" value="{{old('thumbnail')}}">
    @error('thumbnail')
        <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
