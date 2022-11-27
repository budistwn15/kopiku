<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Permission"
        value="{{old('name') ?? $permission->name}}">
    @error('name')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="guard_name" class="form-label">Nama Guard</label>
    <input type="text" name="guard_name" id="guard_name" class="form-control form-control-lg"
        placeholder="Default 'web'" value="{{old('guard_name') ?? $permission->guard_name}}">
    @error('guard_name')
    <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
