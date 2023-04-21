@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h2 class="mt-4 mb-3">Crud List</h2>

    <a href="{{route("cruds.create")}}">
        <button type="button" class="btn btn-dark" style="float: right;">Create</button>
    </a>

    <table class="table table-striped table-hover">
        <colgroup>
            <col width="15%"/>
            <col width="55%"/>
            <col width="15%"/>
            <col width="15%"/>
        </colgroup>
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        {{-- blade 에서는 아래 방식으로 반복문을 처리합니다. --}}
        {{-- Crud Controller의 index에서 넘긴 $cruds(crud 데이터 리스트)를 출력해줍니다. --}}
        @foreach ($cruds as $key => $crud)
            <tr>
                <th scope="row">{{$key+1 + (($cruds->currentPage()-1) * 10)}}</th>
                <td>{{$crud->name}}</td>
                <td>{{$crud->created_at}}</td>
                <td>Edit/Delete</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection