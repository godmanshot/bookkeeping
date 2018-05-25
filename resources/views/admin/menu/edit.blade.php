@extends('admin.layouts.app')

@section('content')

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Меню</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.menu') }}">Меню</a></li>
              <li class="breadcrumb-item active">{{ $menu->title }}</li>
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
                      <h3 class="h4">{{ $menu->title }}</h3>
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
                      <form class="form-horizontal" action="{{ route('admin.menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group row">
                          <label for="menus-page_id" class="col-sm-3 form-control-label">Страница</label>
                          <div class="col-sm-9">
                          <select id="menus-page_id" class="form-control" name="page_id">
                            <option value="" selected>Выберите страницу</option>
                            @foreach($pages as $page)
                              <option value="{{$page->id}}" {{isset($menu) && $menu->page_id == $page->id ? 'selected' : ''}}>{{$page->title}}</option>
                            @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="menus-url" class="col-sm-3 form-control-label">Ссылка</label>
                          <div class="col-sm-9">
                            <input id="menus-url" type="text" name="url" class="form-control" value="{{ $menu->url }}">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="menus-name" class="col-sm-3 form-control-label">Заголовок</label>
                          <div class="col-sm-9">
                            <input id="menus-name" type="text" name="title" required class="form-control" value="{{ $menu->title }}">
                          </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                          <label for="menus-place" class="col-sm-3 form-control-label">Место</label>
                          <div class="col-sm-9">
                            <input id="menus-place" type="text" name="place" required class="form-control" value="{{ $menu->place }}">
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
