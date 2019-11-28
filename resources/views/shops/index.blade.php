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
                        <a class="like-l" href="/shops/{{ $shop->id }}/true">like</a>
                        <a class="like-d" href="/shops/{{ $shop->id }}/false">dislike</a>
                    </div>
                  </div>
            </div>
        @endforeach
        </div>
        <div class="row w-100 justify-content-center" style="">
                {{ $shops->links() }}
        </div>
    </div>


@endsection
