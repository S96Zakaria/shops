@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row w-100" class="pt-3">
        @if (count($shops)!=0)
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
                        <a class="like-d" href="/unlike/{{ $shop->id }}">Remove</a>
                    </div>
                  </div>
            </div>
        @endforeach
        @else
            <div class="alert alert-dark w-100" role="alert">
                <div class="font-weight-bold">You have no preffered shops yet!</div>
                You can add your preffered ones from <a class="font-weight-bold" href="{{route('nearby')}}">here</a>
            </div>
        @endif
        
        </div>
        <div class="row w-100 justify-content-center" style="">
                {{ $shops->links() }}
        </div>
    </div>


@endsection
