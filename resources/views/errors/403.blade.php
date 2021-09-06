@extends('layouts.app')

@section('content')
<div class="back-link">
    <a href="" class="btn btn-primary">Back to Dashboard</a>
</div>
<div class="error-container">
    <i class="pe-7s-way text-success big-icon"></i>
    <h1>403</h1>
    <strong>Unauthorized!</strong>
    <p>
        Sorry!. You are not authorized user to access this url.

    </p>
    <a href="" class="btn btn-xs btn-success">Go back to dashboard</a>
</div>
@endsection