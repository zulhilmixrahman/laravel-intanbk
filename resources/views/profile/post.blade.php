@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col">Hasil Tambah {{ $no1 }} &{{ $no2 }}</div>
    <div class="col text-danger">{{ $no1 + $no2 }}</div>
</div>
@endsection