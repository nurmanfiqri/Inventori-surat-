<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\LoginController;

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
    return view('auth.login');
});
Route::post('/postlogin', 'Auth\LoginController@postlogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::get('/home', 'Admin\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'authLogin'], function () {
    // Halaman Dashboard

    //Halaman User
    Route::get('/user', 'User\UserController@index')->name('user');
    Route::get('/user/create', 'User\UserController@create')->name('createuser');

    // Halaman Route

    // Halaman Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', 'Menu\MenuController@index')->name('menu');
        Route::get('/create', 'Menu\MenuController@create');
        Route::post('/create', 'Menu\menuController@create');
        Route::get('/update/{id}', 'Menu\menuController@update');
        Route::post('/update/{id}', 'Menu\menuController@update');
        Route::post('/delete/{id}', 'Menu\menuController@delete');
    });
    Route::group(['prefix' => 'api/'], function () {
        Route::group(['prefix' => 'master'], function () {
            Route::get('/divisi', 'Api\ApiMasterController@divisi');
            Route::get('/karyawan', 'Api\ApiMasterController@karyawan');
        });

        Route::get('approver-log/list/{id}', 'Api\ApiApprovalController@approverLog');
        Route::get('approver/list/{id}', 'Api\ApiApprovalController@approverList');

        Route::group(['prefix' => 'role'], function () {
            Route::get('/list', 'Api\ApiRoleController@list');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/role', 'Api\ApiRoleController@list');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/role-akses', 'Api\ApiRoleController@roleAkses');
        });
    });

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    //halaman master data surat 
    Route::group(['prefix' => 'master/'], function () {
        Route::group(['prefix' => 'surat'], function () {
            Route::get('/', 'Master\MasterController@index')->name('master');
            Route::get('/create', 'Master\MasterController@create');
            Route::post('/create', 'Master\MasterController@create');
            Route::get('/update/{id}', 'Master\MasterController@update');
            Route::post('/update/{id}', 'Master\MasterController@update');
            Route::post('/delete/{id}', 'Master\MasterController@delete');
            Route::post('/submit/{id}', 'Master\MasterController@submit');
            Route::post('/approve/{id}', 'Master\MasterController@approve');
            Route::get('/view/{id}', 'Master\MasterController@view');
            Route::post('/reject/{id}', 'Master\MasterController@reject');
            Route::get('/download/{id}', 'Master\MasterController@download');
        });

        Route::group(['prefix' => 'divisi'], function () {
            Route::get('/', 'Master\DivisiController@index')->name('master');
            Route::get('/create', 'Master\DivisiController@create');
            Route::post('/create', 'Master\DivisiController@create');
            Route::get('/update/{id}', 'Master\DivisiController@update');
            Route::get('/view/{id}', 'Master\DivisiController@view');
            Route::post('/update/{id}', 'Master\DivisiController@update');
            Route::post('/delete/{id}', 'Master\DivisiController@delete');
        });

        Route::group(['prefix' => 'karyawan'], function () {
            Route::get('/', 'Master\KaryawanController@index')->name('master');
            Route::get('/create', 'Master\KaryawanController@create');
            Route::post('/create', 'Master\KaryawanController@create');
            Route::get('/update/{id}', 'Master\KaryawanController@update');
            Route::get('/view/{id}', 'Master\KaryawanController@view');
            Route::post('/update/{id}', 'Master\KaryawanController@update');
            Route::post('/delete/{id}', 'Master\KaryawanController@delete');
        });
    });

    Route::group(['prefix' => 'api/'], function () {
        Route::group(['prefix' => 'master'], function () {
            Route::get('/list', 'Api\ApiMasterController@list');
        });

        Route::group(['prefix' => 'approval'], function () {
            Route::get('/list', 'Api\ApiApprovalController@list');
        });

        Route::group(['prefix' => 'setting'], function () {
            Route::get('/userlist', 'Api\ApiUserController@list');
            Route::get('/jenis_surat', 'Api\ApiJenisSuratController@list');
            Route::get('/sifat_surat', 'Api\ApiSifatSuratController@list');
            Route::get('/prioritas_surat', 'Api\ApiPrioritasSuratController@list');
            Route::get('/folder_surat', 'Api\ApiFolderSuratController@list');
        });

        Route::group(['prefix' => 'jabatan'], function () {
            Route::get('/jabatan', 'Api\ApiJabatanController@list');
            Route::get('/unit_kerja', 'Api\ApiUnitKerjaController@list');
            Route::get('/department', 'Api\ApiDepartmentController@list');
        });

        Route::get('getInbox', 'Api\ApiInboxController@ct_inbox');

        Route::get('dataInbox', 'Admin\HomeController@dataInbox');
    });

    // Halaman approval list
    Route::group(['prefix' => 'approval/'], function () {
        Route::group(['prefix' => 'approval_list'], function () {
            Route::get('/', 'Approval\ListController@index');
            Route::get('/create', 'Approval\ListController@create');
            Route::post('/create', 'Approval\ListController@create');
            Route::get('/update/{id}', 'Approval\ListController@update');
            Route::post('/update/{id}', 'Approval\ListController@update');
            Route::post('/delete/{id}', 'Approval\ListController@delete');
        });
    });

    //Halaman Approval Log
    Route::group(['prefix' => 'approval/'], function () {
        Route::group(['prefix' => 'approval_log'], function () {
            Route::get('/', 'Approval\LogController@index');
        });
    });

    Route::group(['prefix' => 'api/'], function () {
        Route::get('notifikasi', 'Admin\HomeController@notifikasi');
        Route::group(['prefix' => 'approval'], function () {
            Route::get('/log', 'Api\ApiApprovalController@log');
        });

        Route::group(['prefix' => 'select2'], function () {
            Route::get('/divisi', 'Api\ApiSelect2Controller@divisi');
            Route::get('/divisiLine', 'Api\ApiSelect2Controller@divisiLine');
            Route::get('/jabatan', 'Api\ApiSelect2Controller@jabatan');
            Route::get('/jabatanLine', 'Api\ApiSelect2Controller@jabatanLine');
            Route::get('/user', 'Api\ApiSelect2Controller@user');
            Route::get('/role', 'Api\ApiSelect2Controller@role');
            Route::get('/unit', 'Api\ApiSelect2Controller@unit');
            Route::get('/karyawan', 'Api\ApiSelect2Controller@karyawan');
            ///lanjuut dari sisi
        });
    });

    Route::group(['prefix' => 'jabatan/'], function () {
        Route::group(['prefix' => 'jabatan'], function () {
            Route::get('/', 'jabatan\JabatanController@index');
            Route::get('/create', 'jabatan\JabatanController@create');
            Route::post('/create', 'jabatan\JabatanController@create');
            Route::get('/update/{id}', 'jabatan\JabatanController@update');
            Route::get('/view/{id}', 'jabatan\JabatanController@view');
            Route::post('/update/{id}', 'jabatan\JabatanController@update');
            Route::post('/delete/{id}', 'jabatan\JabatanController@delete');
        });

        Route::group(['prefix' => 'unit_kerja'], function () {
            Route::get('/', 'jabatan\UnitKerjaController@index');
            Route::get('/create', 'jabatan\UnitKerjaController@create');
            Route::post('/create', 'jabatan\UnitKerjaController@create');
            Route::get('/update/{id}', 'jabatan\UnitKerjaController@update');
            Route::get('/view/{id}', 'jabatan\UnitKerjaController@view');
            Route::post('/update/{id}', 'jabatan\UnitKerjaController@update');
            Route::post('/delete/{id}', 'jabatan\UnitKerjaController@delete');
        });

        Route::group(['prefix' => 'department'], function () {
            Route::get('/', 'jabatan\DepartmentController@index');
            Route::get('/create', 'jabatan\DepartmentController@create');
            Route::post('/create', 'jabatan\DepartmentController@create');
            Route::get('/update/{id}', 'jabatan\DepartmentController@update');
            Route::get('/view/{id}', 'jabatan\DepartmentController@view');
            Route::post('/update/{id}', 'jabatan\DepartmentController@update');
            Route::post('/delete/{id}', 'jabatan\DepartmentController@delete');
        });
    });

    //Halaman setting
    Route::group(['prefix' => 'setting/'], function () {
        Route::group(['prefix' => 'workflow'], function () {
            Route::get('/', 'Setting\WorkflowController@index');
            Route::get('/create', 'Setting\WorkflowController@create');
            Route::post('/create', 'Setting\WorkflowController@create');
            Route::get('/update/{id}', 'Setting\WorkflowController@update');
            Route::get('/view/{id}', 'Setting\WorkflowController@view');
            Route::post('/update/{id}', 'Setting\WorkflowController@update');
            Route::post('/delete/{id}', 'Setting\WorkflowController@delete');
        });

        Route::group(['prefix' => 'jenis-surat'], function () {
            Route::get('/', 'Setting\JenisSuratController@index');
            Route::get('/create', 'Setting\JenisSuratController@create');
            Route::post('/create', 'Setting\JenisSuratController@create');
            Route::get('/update/{id}', 'Setting\JenisSuratController@update');
            Route::get('/view/{id}', 'Setting\JenisSuratController@view');
            Route::post('/update/{id}', 'Setting\JenisSuratController@update');
            Route::post('/delete/{id}', 'Setting\JenisSuratController@delete');
        });

        Route::group(['prefix' => 'sifat-surat'], function () {
            Route::get('/', 'Setting\SifatSuratController@index');
            Route::get('/create', 'Setting\SifatSuratController@create');
            Route::post('/create', 'Setting\SifatSuratController@create');
            Route::get('/update/{id}', 'Setting\SifatSuratController@update');
            Route::get('/view/{id}', 'Setting\SifatSuratController@view');
            Route::post('/update/{id}', 'Setting\SifatSuratController@update');
            Route::post('/delete/{id}', 'Setting\SifatSuratController@delete');
        });

        Route::group(['prefix' => 'prioritas-surat'], function () {
            Route::get('/', 'Setting\PrioritasSuratController@index');
            Route::get('/create', 'Setting\PrioritasSuratController@create');
            Route::post('/create', 'Setting\PrioritasSuratController@create');
            Route::get('/update/{id}', 'Setting\PrioritasSuratController@update');
            Route::get('/view/{id}', 'Setting\PrioritasSuratController@view');
            Route::post('/update/{id}', 'Setting\PrioritasSuratController@update');
            Route::post('/delete/{id}', 'Setting\PrioritasSuratController@delete');
        });

        Route::group(['prefix' => 'folder-surat'], function () {
            Route::get('/', 'Setting\FolderSuratController@index');
            Route::get('/create', 'Setting\FolderSuratController@create');
            Route::post('/create', 'Setting\FolderSuratController@create');
            Route::get('/update/{id}', 'Setting\FolderSuratController@update');
            Route::get('/view/{id}', 'Setting\FolderSuratController@view');
            Route::post('/update/{id}', 'Setting\FolderSuratController@update');
            Route::post('/delete/{id}', 'Setting\FolderSuratController@delete');
        });

        Route::group(['prefix' => 'unit_kerja'], function () {
            Route::get('/', 'Setting\UnitKerjaController@index');
            Route::get('/create', 'Setting\UnitKerjaController@create');
            Route::post('/create', 'Setting\UnitKerjaController@create');
            Route::get('/update/{id}', 'Setting\UnitKerjaController@update');
            Route::post('/update/{id}', 'Setting\UnitKerjaController@update');
            Route::post('/delete/{id}', 'Setting\UnitKerjaController@delete');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Setting\UserController@index');
            Route::get('/create', 'Setting\UserController@create');
            Route::post('/create', 'Setting\UserController@create');
            Route::get('/update/{id}', 'Setting\UserController@update');
            Route::post('/update/{id}', 'Setting\UserController@update');
            Route::post('/delete/{id}', 'Setting\UserController@delete');
            Route::get('/editView/{id}', 'Setting\UserController@editView');
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', 'Role\RoleController@index')->name('role');
            Route::get('/create', 'Role\RoleController@create')->name('createrole');
            Route::post('/create', 'Role\RoleController@create')->name('createrole');
            Route::get('/update/{id}', 'Role\RoleController@update');
            Route::post('/update/{id}', 'Role\RoleController@update');
            Route::post('/delete/{id}', 'Role\RoleController@delete');
            Route::get('/view/{id}', 'Role\RoleController@view');
        });

        Route::group(['prefix' => 'role-akses'], function () {
            Route::get('/', 'Role\RoleAksesController@index')->name('role');
            Route::get('/create', 'Role\RoleAksesController@create')->name('createrole');
            Route::post('/create', 'Role\RoleAksesController@create')->name('createrole');
            Route::get('/update/{id}', 'Role\RoleAksesController@update');
            Route::post('/update/{id}', 'Role\RoleAksesController@update');
            Route::post('/delete/{id}', 'Role\RoleAksesController@delete');
            Route::get('/view/{id}', 'Role\RoleAksesController@view');
        });
    });

    Route::group(['prefix' => 'api/'], function () {
        Route::group(['prefix' => 'approval'], function () {
            Route::get('/workflow', 'Api\ApiApprovalController@workflow');
            Route::get('/unitkerja', 'Api\ApiApprovalController@unitkerja');
        });
    });




    Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
});


// Route::group(['prefix' => 'user'],  function () {
//     Route::get('/', 'User\UserController@index');
// });

// Route::group(['middleware', ['authLogin']], function () {
//     Route::get('/user', 'User\UserController@index');
// });

// Route::group(['prefix' => 'role'], function () {
//     Route::get('/', 'Role\RoleController@index');
// });

// Route::get('/menu', function () {
//     return view('user.index');
// });
