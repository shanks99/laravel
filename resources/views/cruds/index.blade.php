@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-4 mb-3">Crud List</h2>

            <a href="{{ route('cruds.create') }}">
                <button type="button" class="btn btn-dark" style="float: right;">Create</button>
            </a>

            <table class="table table-striped table-hover">
                <colgroup>
                    <col width="15%" />
                    <col width="45%" />
                    <col width="15%" />
                    <col width="25%" />
                </colgroup>
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Content</th>
                        <th scope="col">Created At</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
                    {{-- Crud Controller의 index에서 넘긴 $cruds(crud 데이터 리스트)를 출력해줍니다. --}}
                    @foreach ($cruds as $key => $crud)
                        <tr>
                            <th scope="row">{{ $key + 1 + ($cruds->currentPage() - 1) * 10 }}</th>
                            <td>
                                <a href="{{ route('cruds.show', $crud->id) }}">{{ Str::limit($crud->content, 20, '...') }}</a>
                            </td>
                            <td>{{ $crud->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('cruds.edit', $crud) }}" class="btn btn-warning">M</a>

                                <form action="{{ route('cruds.destroy', $crud->id) }}" method="post">
                                    {{-- delete method와 csrt 처리 필요 --}}
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('정말로 삭제 하시겠습니까?');"
                                        class="btn btn-danger">D</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- 라라벨 기본 지원 페이지네이션 --}}
            {!! $cruds->links() !!}
        </div>
    </div>
@endsection
