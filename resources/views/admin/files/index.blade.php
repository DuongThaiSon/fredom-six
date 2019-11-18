@extends('admin.layouts.main', ['activePage' => 'files', 'title' => __('Files')])
@section('content')
<div id="main-content">
    <div id="content">
            @include('ckfinder::setup')
            <div id="ckfinder-widget"></div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
<script>
CKFinder.widget( 'ckfinder-widget', {
	width: '100%',
	height: 700
} );
</script>
@endpush
