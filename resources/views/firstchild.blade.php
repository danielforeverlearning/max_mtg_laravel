@extends ('layouts.mylayout')

@section('title', 'this is my title from firstchildbladephp')

@section('sidebar')
      @parent

	  <p>This is appended to the master sidebar from firstchildbladephp.</p>
@endsection

@section('content')
    <p>This is my body content from firstchildbladephp.</p>
@endsection