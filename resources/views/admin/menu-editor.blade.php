@extends('layouts.app')

@section('title', ' - Menu Editor')

@section('content')
    <menu-editor :categories="{{ $categories }}"></menu-editor>
@endsection