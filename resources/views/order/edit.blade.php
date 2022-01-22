@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Brand</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-5">
                    <form action="{{ route('Order.update', $order->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('Order.field')
                        <div class="mb-3 row">
                            <div class="col-md-2 col-form-label"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('Order.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.unit').on('keyup', function(){
            $(this).val($(this).val().replace(/[^a-zA-Z0-9-]/g, ''));
        });
    </script>
@endsection