@extends('layout.sidenav-layout')
@section('content')
    @include('components.contact.contact-list')
    @include('components.contact.contact-pdf')
    @include('components.contact.contact-delete')
    @include('components.contact.contact-create')
    @include('components.contact.contact-update')
    @include('components.contact.contact-view')
@endsection
