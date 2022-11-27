<div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" id="role" class="form-select">
        <option disabled selected>Pilih Role</option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="permissions[]" class="form-label">Permissions</label>
    <br>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($permissions as $permission)
                <input type="checkbox" class="btn-check" id="{{$permission->id}}" value="{{$permission->id}}" autocomplete="off" />
                <label class="btn btn-outline-primary" for="{{$permission->id}}">{{$permission->name}}</label>
                @endforeach
            </div>
    <div class="text-light small fw-semibold">Untuk memilih permission tekan tombol (bisa memilih lebih dari satu)</div>
</div>
<button type="submit" class="btn btn-primary">{{$button}}</button>
