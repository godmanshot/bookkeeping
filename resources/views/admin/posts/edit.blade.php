@extends('admin.layouts.app')

@section('endhead')
<link href="{{asset('admin-dist/summernote/summernote-lite.css')}}" rel="stylesheet">
@endsection

@section('endbody')
<script src="{{asset('admin-dist/summernote/summernote-lite.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#posts-body').summernote({
      lang: 'ru-RU',
      minHeight: 300
    });
  });
</script>
@endsection

@section('content')

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Статьи</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.posts') }}">Статьи</a></li>
              <li class="breadcrumb-item active">{{ $post->title }}</li>
            </div>
          </ul>
          <!-- Forms Section-->
          <section class="forms"> 
            <div class="container-fluid">
              <div class="row">
                <!-- Form Elements -->
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Запись</h3>
                    </div>
                    <div class="card-body">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form class="form-horizontal" action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group row">
                          <label for="posts-title" class="col-sm-3 form-control-label">Заголовок</label>
                          <div class="col-sm-9">
                            <input id="posts-title" type="text" name="title" required class="form-control" value="{{ $post->title }}">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="posts-title" class="col-sm-3 form-control-label">Картинка</label>
                          <div class="col-sm-9">
                              <input id="posts-img" type="file" name="img">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="posts-title" class="col-sm-3 form-control-label">Текст</label>
                          <div class="col-sm-9">
                              <textarea id="posts-body" name="body" required class="form-control" placeholder="Текст">{{ $post->body }}</textarea>
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection
