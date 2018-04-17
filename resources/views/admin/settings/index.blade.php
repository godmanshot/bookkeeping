@extends('admin.layouts.app')


@section('content')

<!-- Forms Section-->
<section class="forms"> 
  <div class="container-fluid">
    <div class="row">
      <!-- Form Elements -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Настройки</h3>
          </div>
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.settings.store') }}">
              {{ csrf_field() }}
              @foreach($_settings->getInstance() as $aname => $attr)
              <div class="form-group row">
                <label class="col-sm-3 form-control-label">{{$attr->attributes()['desc']}}</label>
                <div class="col-sm-9">
                  <input name="{{$aname}}" type="text" class="form-control" value="{{ $attr }}">
                </div>
              </div>
              <div class="line"></div>
              @endforeach
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
