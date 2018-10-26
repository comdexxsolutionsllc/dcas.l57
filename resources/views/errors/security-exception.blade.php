@extends('layouts.error')

@section('code', 'SE.123-105')
@section('title', __('Security Exception'))

@section('image')
  <div style="background-image: url('/svg/404.svg');"
       class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
  </div>
@endsection

@section('message', __('You are not allowed to access this route outside of the internal network.'))
