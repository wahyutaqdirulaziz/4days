<div class="mb-3 row">
    <label for="code" class="col-md-2 col-form-label">Code</label>
    <div class="col-md-10">
        <input class="form-control code" type="text" name="code" value="{{ isset($itemCategory->code) ? $itemCategory->code : old('code') }}" id="code" required>
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="name" value="{{ isset($itemCategory->name) ? $itemCategory->name : old('name') }}" id="name" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>