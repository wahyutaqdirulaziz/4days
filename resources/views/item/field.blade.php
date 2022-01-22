<div class="mb-3 row">
    <label for="code" class="col-md-2 col-form-label">Code</label>
    <div class="col-md-10">
        <input class="form-control code" type="text" name="code" value="{{ isset($items->code) ? $items->code : old('code') }}" placeholder="code" id="code" required>
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="name" value="{{ isset($items->name) ? $items->name : old('name') }}" placeholder="name" id="name" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="price" class="col-md-2 col-form-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="price" value="{{ isset($items->price) ? $items->price : old('price') }}" placeholder="price" id="price" required>
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row">
    <label for="qty" class="col-md-2 col-form-label">jumlah item</label>
    <div class="col-md-10">
        <input class="form-control" type="number" name="qty" value="{{ isset($items->qty) ? $items->qty : old('qty') }}" id="qty" placeholder="qty" required>
        @error('qty')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>