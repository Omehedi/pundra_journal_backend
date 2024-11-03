@extends('frontend.layouts.master')
@section('content')
    <div id="app">
        <App></App>
    </div>
@endsection
@section('script')
    <script>window.baseUrl = '{{url('/')}}'</script>
    <script>window.publicPath = "{{ env('PUBLIC_PATH') }}";</script>
    <script>window.UploadPath = '{{ env('UPLOAD_PATH') }}';</script>
    <script src="{{ assets('js/app_frontend.js?v=1.4') }}" defer></script>
@endsection
