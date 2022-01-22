<div class="mb-3 row">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="name" value="{{ isset($customer->name) ? $customer->name : old('name') }}" placeholder="Name" id="name" required>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
  
</div>
<div class="mb-3 row">
    
    <label for="kode" class="col-md-2 col-form-label">Kode</label>
    <div class="col-md-10">
        <input class="form-control" type="text" name="kode" value="{{ isset($customer->kode) ? $customer->kode : old('kode') }}" placeholder="Kode" id="kode" required>
        @error('kode')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>