<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home_pages.welcome');
})->name('home.welcome');

Auth::routes();




Route::get('/home_pages/about', 'HomepagesController@about')->name('home.about');
Route::get('/home_pages/arrival', 'HomepagesController@arrival')->name('home.arrival');
Route::get('/home_pages/news', 'HomepagesController@news')->name('home.news');
Route::get('/home_pages/librarian', 'HomepagesController@librarian')->name('home.librarian');

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/home', 'HomeController@index')->name('home.index');
});



Route::group([
      'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/authors', 'AuthorController@index')->name('author.index');
    Route::post('/authors', 'AuthorController@store')->name('author.store');
    Route::get('/authors/{author}/edit', 'AuthorController@edit')->name('author.edit');
    Route::patch('/authors/{author}/edit', 'AuthorController@update')->name('author.update');
    Route::delete('/authors/{author}/delete', 'AuthorController@delete')->name('author.delete');
});


Route::group([
    'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/publishers', 'PublisherController@index')->name('publisher.index');
    Route::post('/publishers', 'PublisherController@store')->name('publisher.store');
    Route::get('/publishers/{publisher}/edit', 'PublisherController@edit')->name('publisher.edit');
    Route::patch('/publishers/{publisher}/edit', 'PublisherController@update')->name('publisher.update');
    Route::delete('/publishers/{publisher}/delete','PublisherController@delete')->name('publisher.delete');
});

Route::group([
    'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/gmd', 'GmdController@index')->name('gmd.index');
    Route::post('/gmd', 'GmdController@store')->name('gmd.store');
    Route::get('/gmd/{gmd}/edit', 'GmdController@edit')->name('gmd.edit');
    Route::patch('/gmd/{gmd}/edit', 'GmdController@update')->name('gmd.update');
    Route::delete('/gmd/{gmd}/delete', 'GmdController@delete')->name('gmd.delete');
});

Route::group([
     'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/subject', 'SubjectController@index')->name('subject.index');
    Route::post('/subject', 'SubjectController@store')->name('subject.store');
    Route::get('/subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
    Route::patch('/subject/{subject}/edit', 'SubjectController@update')->name('subject.update');
    Route::delete('/subject/{subject}/delete', 'SubjectController@delete')->name('subject.destroy');
    
    
});

Route::group([
      'middleware' => ['auth', 'role:admin']
],function(){
    Route::get('/locations', 'LocationController@index')->name('location.index');
    Route::post('/locations', 'LocationController@store')->name('location.store');
    Route::get('/locations/{location}/edit', 'LocationController@edit')->name('location.edit');
    Route::patch('/locations/{location}/edit', 'LocationController@update')->name('location.update');
    Route::delete('/locations/{location}/delete', 'LocationController@delete')->name('location.destroy');
});

Route::group([
    'middleware' => ['auth', 'role:admin']
],function(){
  Route::get('/books', 'BookController@index')->name('book.index');
  Route::post('/books', 'BookController@store')->name('book.store');
  Route::get('/books/{books}/show', 'BookController@show')->name('book.show');
  Route::get('/books/{books}/edit', 'BookController@edit')->name('book.edit');
  Route::patch('/books/{books}/edit', 'BookController@update')->name('book.update');
  Route::delete('/books/{books}/delete', 'BookController@delete')->name('book.delete');
  Route::get('/books/import', 'BookController@import');
  Route::post('/books/import', 'BookController@doimport');
  Route::get('/books/export', 'BookController@export');

});

Route::group([
    'middleware' => ['auth', 'role:admin']
],function(){
  Route::get('/loans', 'LoanController@index')->name('loan.index');
  Route::post('/loans', 'LoanController@store')->name('loan.store');
  Route::get('/loans/report',[
    'uses'  => 'LoanController@report',
    'as'    => 'pdf',
  ]);
  Route::get('/loans/{loans}/return', 'LoanController@returnbook')->name('loan.return');

  Route::patch('/loans/{loans}/return', 'LoanController@returnupdate')->name('loan.returnupdate');

  Route::get('/loans/{loans}/edit', 'LoanController@edit')->name('loan.edit');
  Route::patch('/loans/{loans}/edit', 'LoanController@update')->name('loan.update');
  Route::delete('/loans/{loans}/delete', 'LoanController@delete')->name('loan.delete');
    
});

Route::get('/profile','ProfileController@show'
)->name('profile');