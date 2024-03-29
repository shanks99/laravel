{{-- layout 으로 --}}
@extends('layouts.app')

{{-- 아래 html 을 @yield('content') 에 보낸다고 생각하시면 됩니다. --}}
@section('content')
    <div class="container">
        <h2 class="mt-4 mb-3">Board Create</h2>

        {{-- 유효성 검사에 걸렸을 경우 --}}
        @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('boards.store') }}" method="post">
            {{-- 라라벨은 CSRF로 부터 보호하기 위해 데이터를 등록할 때의 위조를 체크 하기 위해 아래 코드가 필수 --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" />
            </div>
            <div class="mb-3">
                <textarea rows="10" cols="40" name="content" class="form-control" id="content" autocomplete="off"></textarea>
            </div>
            <div class="d-flex justify-content-center p-3">
                <button type="submit" class="btn btn-primary btn-lg">등록</button>
            </div>
        </form>
    </div>
@endsection
