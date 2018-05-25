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
              <li class="breadcrumb-item active">Меню</li>
            </div>
          </ul>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Меню</h3>
                    </div>
                    <div class="card-body">
                      <a href="{{ route('admin.menu.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Создать</a>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Ссылка</th>
                            <th>Заголовок</th>
                            <th>Место</th>
                            <th>Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($menu as $point)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $point->url }}</td>
                              <td>{{ $point->title }}</td>
                              <td>{{ $point->place }}</td>
                              <td>
                                  <a href="{{ route('admin.menu.edit', $point) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <form action="{{ route('admin.menu.destroy', $point) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }} <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"><i class="fa fa-trash" aria-hidden="true"></i></a></form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection
