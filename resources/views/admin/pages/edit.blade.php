@extends('admin.layouts.app')

@section('endhead')
<link href="{{asset('admin-dist/summernote/summernote-lite.css')}}" rel="stylesheet">
@endsection

@section('endbody')
<script src="{{asset('admin-dist/summernote/summernote-lite.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#pages-body').summernote({
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
              <h2 class="no-margin-bottom">Страницы</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.pages') }}">Страницы</a></li>
              <li class="breadcrumb-item active">{{ $page->title }}</li>
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
                      <h3 class="h4">{{ $page->title }}</h3>
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
                      <form class="form-horizontal" action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <input id="pages-name" type="hidden" name="title" required class="form-control" value="{{ $page->title }}">
                        <div class="form-group row">
                          <label for="pages-body" class="col-sm-3 form-control-label">Текст</label>
                          <div class="col-sm-9">
                              <textarea id="pages-body" name="content" class="form-control" placeholder="Текст">{{ $page->content }}</textarea>
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
