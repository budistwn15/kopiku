<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Kategori" value="{{old('name') ?? $category->name}}">
    @error('name')
        <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" class="form-control form-control-lg" placeholder="Masukkan Deskripsi">{{old('description') ?? $category->description}}</textarea>
    @error('description')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
