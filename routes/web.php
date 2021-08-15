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
	if (Auth::check()) {
        $user = Auth::user();
        $roles = $user->roles;
        return redirect('/'.$roles->first()->name);
	}
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/check_role', 'HomeController@check_role');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    //Route::get('/users', 'AdminController@users')->name('users');
    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
    Route::resource('profile', 'Admin\ProfileController');


    Route::resource('students', 'Admin\StudentsController');
    Route::post('students_mass_destroy', ['uses' => 'Admin\StudentsController@massDestroy', 'as' => 'students.mass_destroy']);

    Route::resource('professors', 'Admin\ProfessorsController');
    Route::post('professors_mass_destroy', ['uses' => 'Admin\ProfessorsController@massDestroy', 'as' => 'professors.mass_destroy']);

    Route::resource('parents', 'Admin\ParentsController');
    Route::post('parents_mass_destroy', ['uses' => 'Admin\ParentsController@massDestroy', 'as' => 'parents.mass_destroy']);

    Route::resource('departaments', 'Admin\DepartamentsController');
    Route::post('departaments_mass_destroy', ['uses' => 'Admin\DepartamentsController@massDestroy', 'as' => 'departaments.mass_destroy']);

    Route::resource('classes', 'Admin\ClassesController');
    Route::post('classes_mass_destroy', ['uses' => 'Admin\ClassesController@massDestroy', 'as' => 'classes.mass_destroy']);

    Route::resource('sections', 'Admin\SectionsController');
    Route::post('sections_mass_destroy', ['uses' => 'Admin\SectionsController@massDestroy', 'as' => 'sections.mass_destroy']);

    Route::resource('subjects', 'Admin\SubjectsController');
    Route::get('subjects/select_class/{id}', 'Admin\SubjectsController@select_class');
    Route::get('subjects/select_section/{id}', 'Admin\SubjectsController@select_section');
    Route::get('subjects/select_subject/{dep_id}/{class_id}/{section_id}', 'Admin\SubjectsController@select_subject');
    Route::post('subjects_mass_destroy', ['uses' => 'Admin\SubjectsController@massDestroy', 'as' => 'subjects.mass_destroy']);

    Route::resource('academicsyllabus', 'Admin\AcademicSyllabusController');
    Route::post('academicsyllabus_mass_destroy', ['uses' => 'Admin\AcademicSyllabusController@massDestroy', 'as' => 'AcademicSyllabus.mass_destroy']);

    Route::resource('studymaterials', 'Admin\StudyMaterialController');
    Route::post('studymaterials_mass_destroy', ['uses' => 'Admin\StudyMaterialController@massDestroy', 'as' => 'studymaterials.mass_destroy']);

    Route::resource('exams', 'Admin\ExamsController');
    Route::post('exams_mass_destroy', ['uses' => 'Admin\ExamsController@massDestroy', 'as' => 'exams.mass_destroy']);

    Route::resource('grades', 'Admin\GradesController');
    Route::post('grades_mass_destroy', ['uses' => 'Admin\GradesController@massDestroy', 'as' => 'grades.mass_destroy']);

    Route::resource('books', 'Admin\BooksController');
    Route::post('books_mass_destroy', ['uses' => 'Admin\BooksController@massDestroy', 'as' => 'books.mass_destroy']);

    //Route::resource('inventory', 'Admin\InventoryController');
    // Route::post('inventory_mass_destroy', ['uses' => 'Admin\inventoryController@massDestroy', 'as' => 'Inventory.mass_destroy']);
    Route::namespace('Admin\Inventory')->prefix('inventory')->name('inventory.')->group(function () {
        //Route::resource('inventory', 'Admin\InventoryController');
        // Route::post('inventory_mass_destroy', ['uses' => 'Admin\inventoryController@massDestroy', 'as' => 'Inventory.mass_destroy']);
        Route::resource('category', 'CategoryController');
        Route::post('inventory_category_mass_destroy', ['uses' => 'Admin\InventoryController@massDestroy', 'as' => 'Inventory_category.mass_destroy']);
        Route::resource('suppliers', 'SupplierController');
        Route::post('inventory_supplier_mass_destroy', ['uses' => 'Admin\SupplierController@massDestroy', 'as' => 'inventory_supplier.mass_destroy']);
    });
});


//Route::get('/test', 'TestController@index');
Route::get('test/{id?}', function($id = 'index'){
    $testController = App::make('App\Http\Controllers\TestController');
    return $testController->callAction($id, $parameters = array());
});