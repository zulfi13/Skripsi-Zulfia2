@extends('template')

@section('content')
<form method="post" action="{{ route('kapsmaterial.update',$data->id) }}">
    @csrf
    @method('PUT')

    <!-- Field untuk qtyPack -->
    <input type="hidden" name="id" value="{{ $data->id }}">
    <input type="hidden" name="volume" value="{{ $data->volume }}">
    {{-- <input type="hidden" name="total_volume" value="{{ $data->total_volume }}"> --}}
    <div class="form-group">
        <label for="qtyPack">Quantity Pack:</label>
        <input type="text" class="form-control" id="qtyPack" name="qtyPack" value="{{ $data->qty_pack }}" required>
    </div>

    <!-- Field untuk qtyBox -->
    <div class="form-group">
        <label for="qtyBox">Quantity Box:</label>
        <input type="text" class="form-control" id="qtyBox" name="qtyBox" value="{{ $data->qty_box }}" required>
    </div>

    <!-- Tombol submit -->
    <button type="submit" class="btn btn-primary">Update Material</button>
</form>
@endsection
