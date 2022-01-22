

<div class="mb-3 row">
    <label for="customer" class="col-md-2 col-form-label">Customer</label>
    <div class="col-md-10">
        <select class="form-control form-control-sm" name="customer" id="customer">
            <option value="#">- pilih customer -</option>
            @foreach ($customer as $c)

            <option value="{{ $c->kode }}">{{ $c->name }}</option>
            @endforeach
           
        </select>
        @error('customer')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
  
</div>


<div class="mb-3 row">
    <label for="date" class="col-md-2 col-form-label">date</label>
    <div class="col-md-10">
        <input type="hidden" name="total" value="{{ Cart::getTotal() }}">
        <input class="form-control form-control-sm" type="date" name="date" value="{{ isset($customer->date) ? $customer->date : old('date') }}" placeholder="discount" id="discount" required>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
  
</div>
<div class="mb-3 row">
    
    <label for="discount" class="col-md-2 col-form-label">Discount</label>
    <div class="col-md-10">
        <input class="form-control form-control-sm" type="number" name="discount" value="{{ isset($customer->number) ? $customer->number : old('discount') }}" placeholder="discount" id="discount" required>
        @error('discount')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    @foreach ($cartItems as $item)
    <input type="hidden" value="{{ $item->id }}" name="id_item[]">
    <input type="hidden" value="{{ $item->name }}" name="name[]">
    <input type="hidden" value="{{ $item->price }}" name="price[]">
    <input type="hidden" value="{{ $item->code }}"  name="code[]">
    <input type="hidden" value="{{ $item->qty }}" name="qty[]">
    @endforeach
</div>

