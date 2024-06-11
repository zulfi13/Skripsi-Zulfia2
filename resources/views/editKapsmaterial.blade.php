@extends('template')

@section('content')
<form method="post" action="{{ route('kapsmaterial.update', ['qty' => optional($dataMaterial)->qtyPack]) }}">
    @csrf
    @method('PUT')

    <!-- Field untuk qtyPack -->
    <div class="form-group">
        <label for="qtyPack">Quantity Pack:</label>
        <input type="text" class="form-control" id="qtyPack" name="qtyPack" value="{{ $dataMaterial->qtyPack }}" required>
    </div>

    <!-- Field untuk qtyBox -->
    <div class="form-group">
        <label for="qtyBox">Quantity Box:</label>
        <input type="text" class="form-control" id="qtyBox" name="qtyBox" value="{{ $dataMaterial->qtyBox }}" required>
    </div>

    <!-- Tombol submit -->
    <button type="submit" class="btn btn-primary">Update Material</button>
</form>
@endsection
