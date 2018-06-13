@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>{{ $task->name }}</h1>
                <form>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="success" name="success" @if($task->success) checked @endif>
                        <label class="form-check-label" for="success">Marcar como terminada</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <hr>
                <div class="fb-comments" data-href="{{ secure_url('tasks', [$task->id]) }}" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=865786503609640';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
@endsection