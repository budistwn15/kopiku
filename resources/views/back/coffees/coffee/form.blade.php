<div class="mb-3">
    <label for="code" class="form-label">Kode Kopi <span class="text-danger">(8 Karakter)</span></label>
    <input type="text" name="code" id="code" class="form-control form-control-lg" placeholder="Contoh: 2022AA01" value="{{old('code') ?? $coffee->code}}" @if ($coffee->code)
        readonly
    @endif>
    @error('code')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Kopi"
        value="{{old('name') ?? $coffee->name}}">
    @error('name')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="tagline" class="form-label">Tagline</label>
    <input type="text" name="tagline" id="tagline" class="form-control form-control-lg" placeholder="Masukkan Tagline"
        value="{{old('tagline') ?? $coffee->tagline}}">
    @error('tagline')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="stock" class="form-label">Stok</label>
    <input type="number" name="stock" id="stock" class="form-control form-control-lg" placeholder="Masukkan Stok"
        value="{{old('stock') ?? $coffee->stock}}">
    @error('stock')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="number" name="price" id="price" class="form-control form-control-lg" placeholder="Masukkan Harga"
        value="{{old('price') ?? $coffee->price}}">
    @error('price')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="weight" class="form-label">Berat <span class="text-danger">(gram)</span></label>
    <input type="number" name="weight" id="weight" class="form-control form-control-lg" placeholder="Masukkan Berat"
        value="{{old('weight') ?? $coffee->weight}}">
    @error('weight')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="taste" class="form-label mb-0">Rasa</label>
    <div class="form-group">
        @php
        $tastes = explode(",",$coffee->taste)
        @endphp
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" name="taste[]" type="checkbox" id="Asam" value="Asam"
            @foreach ($tastes as $taste)
                @if ($taste == "Asam")
                    checked
                @endif
            @endforeach>
            <label class="form-check-label" for="Asam">Asam</label>
        </div>
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" name="taste[]" type="checkbox" id="Pahit" value="Pahit"
            @foreach ($tastes as $taste)
                @if ($taste == "Pahit")
                    checked
                @endif
            @endforeach>
            <label class="form-check-label" for="Pahit">Pahit</label>
        </div>
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" name="taste[]" type="checkbox" id="Manis" value="Manis"
            @foreach ($tastes as $taste)
                @if ($taste == "Manis")
                    checked
                @endif
            @endforeach>
            <label class="form-check-label" for="Manis">Manis</label>
        </div>
    </div>
    @error('taste')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="types" class="form-label mb-0">Kategori</label>
    <div class="form-group">
        @foreach ($types as $type)
        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" name="types[]" type="checkbox" id="{{$type->id}}"
                value="{{$type->id}}" {{$coffee->types()->find($type->id) ? 'checked' : ''}}>
            <label class="form-check-label" for="{{$type->id}}">{{$type->name}}</label>
        </div>
        @endforeach
    </div>
    <div class="form text">Tidak ada Tipe? <a href="{{route('types.index')}}" class="text-danger">Tambah
            Tipe</a></div>
    @error('types')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" id="summernote" class="form-control form-control-lg">
        {{old('description') ?? $coffee->description}}
    </textarea>
    @error('description')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <div class="form-group">
        @if ($coffee->thumbnail)
        <img src="{{asset('storage/assets/images/coffees/'.$coffee->thumbnail)}}" class="img-fluid" width="150">
        @endif
    </div>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control form-control-lg" placeholder="Masukkan Berat"
        value="{{old('thumbnail')}}">
        <div class="form-text">* Maksimal 5MB</div>
        <div class="form-text">* Format gambar [png, jpg]</div>
    @error('thumbnail')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
