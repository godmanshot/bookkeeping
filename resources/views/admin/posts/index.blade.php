@extends('admin.layouts.app')


@section('content')

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Новости</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
              <li class="breadcrumb-item active">Новости</li>
            </div>
          </ul>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Новости</h3>
                    </div>
                    <div class="card-body">
                      <a href="{{ route('admin.posts.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Создать</a>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Создано</th>
                            <th>Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($posts as $idx => $post)
                            <tr>
                              <th scope="row">{{ $idx+1 }}</th>
                              <td><a href="{{ route('posts.show', $post) }}" target="_blank">{{ $post->title }}</a></td>
                              <td>{{ $post->createTime() }}</td>
                              <td>
                                  <a href="{{ route('admin.posts.edit', $post) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }} <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"><i class="fa fa-trash" aria-hidden="true"></i></a></form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection
