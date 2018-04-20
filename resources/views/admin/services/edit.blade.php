@extends('admin.layouts.app')

@section('endhead')
<link href="{{asset('admin-dist/summernote/summernote-lite.css')}}" rel="stylesheet">
@endsection

@section('endbody')
<script src="{{asset('admin-dist/summernote/summernote-lite.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#services-body').summernote({
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
              <h2 class="no-margin-bottom">Курсы</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.services') }}">Курсы</a></li>
              <li class="breadcrumb-item active">{{ $service->name }}</li>
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
                      <form class="form-horizontal" action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group row">
                          <label for="services-name" class="col-sm-3 form-control-label">Заголовок</label>
                          <div class="col-sm-9">
                            <input id="services-name" type="text" name="name" required class="form-control" value="{{ $service->name }}">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="services-price" class="col-sm-3 form-control-label">Цена</label>
                          <div class="col-sm-9">
                            <input id="services-price" type="number" name="price" required class="form-control" value="{{ $service->price }}">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="services-img" class="col-sm-3 form-control-label">Картинка</label>
                          <div class="col-sm-9">
                              <input id="services-img" type="file" name="img">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="services-body" class="col-sm-3 form-control-label">Текст</label>
                          <div class="col-sm-9">
                              <textarea id="services-body" name="body" required class="form-control" placeholder="Текст">{{ $service->body }}</textarea>
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
