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
                      <form class="form-horizontal" action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label class="form-control-label">Страница</label>
                              <select class="form-control" name="page_id">
                                <option value="" selected>Выберите страницу</option>
                                @foreach($pages as $page)
                                  <option value="{{$page->id}}">{{$page->title}}</option>
                                @endforeach
                              </select>
                            </div>
                            ИЛИ
                            <div class="form-group-material">
                              <input id="menu-url" type="text" name="url" class="input-material">
                              <label for="menu-url" class="label-material">Ссылка</label>
                            </div>
                            <div class="form-group-material">
                              <input id="menu-title" type="text" name="title" required class="input-material">
                              <label for="menu-title" class="label-material">Заголовок</label>
                            </div>
                            <div class="form-group-material">
                              <input id="menu-place" type="number" name="place" required class="input-material">
                              <label for="menu-place" class="label-material">Место</label>
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

