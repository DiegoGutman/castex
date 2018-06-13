@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tareas
                </div>
                <div class="card-body">
                    <tasks :user="{{ auth()->user()->id }}"></tasks>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
