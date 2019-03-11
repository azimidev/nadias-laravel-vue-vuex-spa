@extends('layouts.app')

@section('title', ' - Categories')

@section('content')
    <h1>Categories</h1>
    <category-manager :initial-categories="{{ $categories }}"></category-manager>
@endsection