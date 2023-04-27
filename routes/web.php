<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# 기본 라우트 생성하기
// Route::get('foo', function () {
//     return 'hello';
// });

# URL 세그먼트가 있는 라이우트 생성
// Route::get('foo/{name}', function ($name) {
//     return 'Hello '.$name;
// });

# 다양한 요청 메소드
/*기본 HTTP 메소드 매핑*/
// Route::get($uri, $action);
// Route::post($uri, $action);
// Route::put($uri, $action);
// Route::patch($uri, $action);
// Route::delete($uri, $action);
// Route::options($uri, $action);

/*다수의 HTTP 메소드의 한 번에 매핑해야할 때는 match 메소드를 사용합니다.*/
// Route::match(['get', 'post'], '/', $action);

/*모든 HTTP 메소드의 매핑해야할 때는 any 메소드를 사용합니다.*/
// Route::any('foo', $action);

# 리다이렉트 라우트
// Route::redirect('/here', '/there', 301);

# 뷰 라우트
// Route::view('/foo', $action);
// Route::view('/foo', $action, ['name' => 'roadJeong']);

/*
|--------------------------------------------------------------------------
| Crud
|--------------------------------------------------------------------------
|
| Crud 기본 테스트
|
*/

 # cruds 로 get 요청이 올 경우 CrudController 의 index 함수를 실행합니다.
 # name 은 별명으로 나중에 route('crud.index') 로 쉽게 주소 출력이 가능합니다.
Route::get('/cruds',[App\Http\Controllers\CrudController::class, 'index'])->name('cruds.index');

// create 등록 페이지
Route::get('/cruds/create',[App\Http\Controllers\CrudController::class, 'create'])->name('cruds.create');

// store 요청은 form을 통해 post로 옵니다
Route::post('/cruds/store',[App\Http\Controllers\CrudController::class, 'store'])->name('cruds.store');

# {crud}는 주소의 변경가능한 값이 오는 것을 crud로 받는 것을 의미합니다, 이 값은 현재 아이디가 오는 데
# 해당 아이디에 맞춘 모델 객체를 CrudController의 show 함수에 매개변수로 보내는 동작을 수행합니다.
// Crud 전체로 받는 방법
Route::get('/cruds/{crud}',[App\Http\Controllers\CrudController::class, 'show'])->name('cruds.show');
// id만 받는 방법
// Route::get('/cruds/show/{id}',[App\Http\Controllers\CrudController::class, 'show'])->name('cruds.show');
