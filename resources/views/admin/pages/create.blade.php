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
              <li class="breadcrumb-item active">Новая запись</li>
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
                      <form class="form-horizontal" action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group-material">
                              <input id="pages-name" type="text" name="title" required class="input-material">
                              <label for="pages-name" class="label-material">Заголовок</label>
                            </div>
                            <div class="form-group-material" style="padding-left: 30px;">
                              <textarea id="pages-body" name="content" class="form-control" placeholder="Текст"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Добавить</button>
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

