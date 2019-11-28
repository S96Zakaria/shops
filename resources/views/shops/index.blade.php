@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" class="pt-3">
        @foreach( $shops as $shop )
            <div class="col-4 pb-5">
                <div class="card h-100 border-0 shadow">
                    <div class="card-img-top">
                      <div class="embed-responsive embed-responsive-4by3">
                        <div class="embed-responsive-item">
                          <img src="{{ $shop->image }}" alt="" class="img-fluid w-100" />
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <p>{{ $shop->name }}</p>
                        <a class="like-l" href="/like" onclick="event.preventDefault();
                                      document.getElementById('like').value = '1';
                                      document.getElementById('id').value = {{ $shop->id }};
                                      document.getElementById('like-form').submit();">
                                Like
                        </a>
                        <a class="like-d" href="/like" onclick="event.preventDefault();
                                      document.getElementById('like').value = '0';
                                      document.getElementById('id').value = {{ $shop->id }};
                                      document.getElementById('like-form').submit();">
                                DisLike
                        </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="row w-100 justify-content-center" style="">
                  {{ $shops->links() }}
                </div>
              </div>
              
              
            <form id="like-form" action="/like" method="POST" style="display: none;">
                @csrf
                <input type="text" id="id" name="id" value=""/>
                <input type="text" id="like" name="like" value=""/>
            </form>
              @endsection
