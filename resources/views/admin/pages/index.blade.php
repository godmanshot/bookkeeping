@extends('admin.layouts.app')


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
              <li class="breadcrumb-item active">Страницы</li>
            </div>
          </ul>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Страницы</h3>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($pages as $idx => $page)
                            <tr>
                              <th scope="row">{{ $idx+1 }}</th>
                              <td>{{ $page->title }}</td>
                              <td>
                                  <a href="{{ route('admin.pages.edit', $page) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $pages->links('pagination::bootstrap-4') }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection
