@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Adopt me
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $adoption->name }}</h5>
                        <p class="card-text">{{ $adoption->description }}</p>
                        <!-- Task 5 User, step 4: this form should not appear if the pet was already adopted -->
                        @auth
                        <form method="POST" action="{{ route('adoptions.adopt', $adoption) }}" >
                            @if(!$adoption->adopted_by == auth()->id())
                            @csrf
                            <button type="submit" class="pet-adopt">Adopt Me!</button>
                            @endif
                        </form>
                        @if($adoption->adopted_by != null)
                            @if($adoption->adopted_by == auth()->id())
                                <p class="text-success">This pet has been adopted by you :)</p>
                            @else
                                <p class="text-danger">This pet has already been adopted.</p>
                            @endif
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="ratio ratio-1x1 ">
                    <img src="{{ asset($adoption->image_path) }}"
                         class="card-img-top border border-2 border-dark rounded-3"
                         style="object-fit: cover" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
