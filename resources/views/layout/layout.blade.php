<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00efd8">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <title>Arcite | @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/dist/img/aricon.svg') }}"> 
  <link rel="apple-touch-icon" href="{{ asset('dashboard/dist/img/aricon.svg') }}">
  @include('layout.header')
  <div class="content-wrapper">
    @yield('content')
  </div>
  @include('layout.footer')