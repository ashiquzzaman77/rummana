<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\PartnersController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectMsgController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SiteSetting;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use GuzzleHttp\RedirectMiddleware;

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


// Index
Route::get('/', [IndexController::class, 'Index'])->name('index');

Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__ . '/auth.php';

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');


// Admin Middleware

Route::middleware(['auth', 'roles:admin'])->group(function () {

    //Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    //Admin Password
    Route::get('/admin/password', [AdminController::class, 'AdminPassword'])->name('admin.password');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
});


// Admin Middleware All Route

Route::middleware(['auth', 'roles:admin'])->group(function () {

    // Admin Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/all/admin', 'AllAdmin')->name('all.admin')->middleware('permission:all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin')->middleware('permission:add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/new/admin/{id}', 'DeleteNewAdmin')->name('delete.new.admin');
    });

    // Role Section
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/role', 'AllRole')->name('all.role')->middleware('permission:all.role');
        Route::get('/add/role', 'AddRole')->name('add.role')->middleware('permission:all.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');


        Route::get('/all/role/permission', 'AllRolePermission')->name('all.role.permission')->middleware('permission:all.role.permission');

        Route::get('/add/role/permission', 'AddRolePermission')->name('add.role.permission')->middleware('permission:add.role.permission');

        Route::post('/store/role/permission', 'StoreRolePermission')->name('store.role.permission');
        Route::get('/admin/edit/role/{id}', 'AdminEditRole')->name('admin.edit.role');
        Route::post('/admin/update/role/{id}', 'AdminUpdateRole')->name('admin.update.role');
        Route::get('/admin/delete/role/{id}', 'AdminDeleteRole')->name('admin.delete.role');
    });

    // Permission Section
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/permission', 'AllPermission')->name('all.permission')->middleware('permission:all.permission');

        Route::get('/add/permission', 'AddPermission')->name('add.permission')->middleware('permission:all.permission');

        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Excel File
        Route::get('/export', 'Export')->name('export');
        Route::get('/import', 'Import')->name('import');
        Route::post('/store/import', 'StoreImport')->name('store.import');
    });

    // Subscribe Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/view/subscribe', 'Subscribe')->name('view.subscribe')->middleware('permission:subscribe.menu');

        Route::get('/delete/subscribe/{id}', 'DeleteSubscribe')->name('delete.subscribe')->middleware('permission:subscribe.menu');
    });

    // BlogController Section
    Route::controller(BlogController::class)->group(function () {

        Route::get('/all/blog', 'AllBlog')->name('all.blog')->middleware('permission:all.blog');
        Route::get('/add/blog', 'AddBlog')->name('add.blog')->middleware('permission:add.blog');
        Route::post('/store/blog', 'StoreBlog')->name('store.blog');
        Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
        Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
        Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

        Route::get('/inactive/blog/{id}', 'InactiveBlog')->name('inactive.blog');
        Route::get('/active/blog/{id}', 'ActiveBlog')->name('active.blog');
    });

    // Project Message
    Route::controller(ProjectMsgController::class)->group(function () {

        Route::get('/project/message', 'ProjectMessage')->name('project.message')->middleware('permission:project.msg');
        Route::get('/view/project/message/{id}', 'ViewProjectMessage')->name('view.project.message');

        Route::get('/delete/project/message/{id}', 'DeleteProjectMessage')->name('delete.project.message');
    });

    // Salary Section
    Route::controller(SalaryController::class)->group(function () {

        Route::get('/all/advance/salary', 'AllAdvanceSalary')->name('all.advance.salary')->middleware('permission:all.salary');

        Route::get('/add/advance/salary', 'AddAdvanceSalary')->name('add.advance.salary')->middleware('permission:add.salary');

        Route::post('/store/advance/salary', 'StoreAdvanceSalary')->name('store.advance.salary');
        Route::get('/edit/advance/salary/{id}', 'EditAdvanceSalary')->name('edit.advance.salary');
        Route::post('/update/advance/', 'UpdateAdvanceSalary')->name('update.advance.salary');
        Route::get('/pay/salary/{id}', 'PaySalary')->name('pay.salary');
    });

    // Employee Section
    Route::controller(EmployeeController::class)->group(function () {

        Route::get('/all/employee', 'AllEmployee')->name('all.employee')->middleware('permission:all.employee');

        Route::get('/add/employee', 'AddEmployee')->name('add.employee')->middleware('permission:add.employee');

        Route::post('/store/employee', 'StoreEmployee')->name('store.employee');
        Route::get('/edit/employee/{id}', 'EditEmployee')->name('edit.employee');
        Route::post('/update/employee', 'UpdateEmployee')->name('update.employee');
        Route::get('/delete/employee/{id}', 'DeleteEmployee')->name('delete.employee');
    });

    // Working Partners Section
    Route::controller(PartnersController::class)->group(function () {

        Route::get('/all/partners', 'AllPartners')->name('all.partners')->middleware('permission:all.partner');

        Route::get('/add/partners', 'AddPartners')->name('add.partners')->middleware('permission:add.partner');

        Route::post('/store/partners', 'StorePartners')->name('store.partners');
        Route::get('/edit/partners/{id}', 'EditPartners')->name('edit.partners');
        Route::post('/update/partners', 'UpdatePartners')->name('update.partners');
        Route::get('/delete/partners/{id}', 'DeletePartners')->name('delete.partners');
    });

    // SiteSetting Section
    Route::controller(SiteSettingController::class)->group(function () {

        Route::get('/all/sitesetting', 'AllSiteSetting')->name('all.sitesetting')->middleware('permission:all.sitesetting');

        Route::get('/add/sitesetting', 'AddSiteSetting')->name('add.sitesetting')->middleware('permission:add.sitesetting');

        Route::post('/store/sitesetting', 'StoreSiteSetting')->name('store.sitesetting');
        Route::get('/edit/sitesetting/{id}', 'EditSitesetting')->name('edit.sitesetting');
        Route::post('/update/sitesetting', 'UpdateSitesetting')->name('update.sitesetting');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    });

    // Project Section
    Route::controller(ProjectController::class)->group(function () {

        Route::get('/all/project', 'AllProject')->name('all.project');

        Route::get('/add/project', 'AddProject')->name('add.project');

        Route::post('/store/project', 'StoreProject')->name('store.project');
        Route::get('/edit/project/{id}', 'EditProject')->name('edit.project');
        Route::post('/update/project', 'UpdateProject')->name('update.project');
        Route::get('/delete/project/{id}', 'DeleteProject')->name('delete.project');


        // Gallery Image

        Route::post('/store/gallery/image', 'StoreGalleryImage')->name('store.gallery.image');
        Route::post('/update/gallery/image', 'UpdateGalleryImage')->name('update.gallery.image');
        Route::get('/delete/gallery/image/{id}', 'DeleteGalleryImage')->name('delete.gallery.image');
    });

    // Message Section
    Route::controller(AdminController::class)->group(function () {

        Route::get('/contact/message', 'ContactMessage')->name('contact.message')->middleware('permission:contact.msg');
        Route::get('/view/contact/message/{id}', 'ViewContactMessage')->name('view.contact.message');
        Route::get('/delete/contact/message/{id}', 'DeleteContactMessage')->name('delete.contact.message');
    });

    // Tesimonial Section
    Route::controller(TestimonialController::class)->group(function () {

        Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial')->middleware('permission:all.testimonial');

        Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial')->middleware('permission:add.testimonial');

        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    });

    // Service Section
    Route::controller(ServiceController::class)->group(function () {

        Route::get('/all/service', 'AllService')->name('all.service')->middleware('permission:all.service');

        Route::get('/add/service', 'AddService')->name('add.service')->middleware('permission:add.service');

        Route::post('/store/service', 'StoreService')->name('store.service');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
        Route::post('/update/service', 'UpdateService')->name('update.service');
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
    });

    // Team Section
    Route::controller(TeamController::class)->group(function () {

        Route::get('/all/team', 'AllTeam')->name('all.team')->middleware('permission:all.team');

        Route::get('/add/team', 'AddTeam')->name('add.team')->middleware('permission:add.team');

        Route::post('/store/team', 'StoreTeam')->name('store.team');
        Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        Route::post('/update/team', 'UpdateTeam')->name('update.team');
        Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
    });

    // About Section
    Route::controller(AboutController::class)->group(function () {

        Route::get('/all/about', 'AllAbout')->name('all.about')->middleware('permission:all.about');
        Route::get('/add/about', 'AddAbout')->name('add.about')->middleware('permission:add.about');
        Route::post('/store/about', 'StoreAbout')->name('store.about');
        Route::get('/edit/about/{id}', 'EditAbout')->name('edit.about');
        Route::post('/update/about', 'UpdateAbout')->name('update.about');
        Route::get('/delete/about/{id}', 'DeleteAbout')->name('delete.about');
    });

    // Banner Section
    Route::controller(BannerController::class)->group(function () {

        Route::get('/all/banner', 'AllBanner')->name('all.banner')->middleware('permission:all.banner')->middleware('permission:all.banner');

        Route::get('/add/banner', 'AddBanner')->name('add.banner')->middleware('permission:add.banner')->middleware('permission:add.banner');

        Route::post('/store/banner', 'StoreBanner')->name('store.banner');
        Route::get('/edit/banner/{id}', 'EditBanner')->name('edit.banner');
        Route::post('/update/banner', 'UpdateBanner')->name('update.banner');
        Route::get('/delete/banner/{id}', 'DeleteBanner')->name('delete.banner');
    });
});


Route::controller(IndexController::class)->group(function () {

    // Team
    Route::get('/all/team', 'AllTeam')->name('all.team');
    Route::get('/all/team/details/{id}', 'TeamDetails')->name('team.details');

    // Contact
    Route::get('/contact', 'Contact')->name('contact');
    Route::post('/store/message', 'StoreMessage')->name('store.message');

    // Project
    Route::get('/project/details/{id}/{slug}', 'ProjectDetails');
    Route::get('/frontend/all/project', 'FrontendAllProject')->name('frontend.all.project');

    // Project Message
    Route::post('/store/project/message', 'StoreProjectMessage')->name('store.project.message');

    // Blog Details
    Route::get('/blog/details/{id}/{slug}', 'BlogDetails');
    Route::get('/frontend/all/blog', 'FrontendAllBlog')->name('frontend.all.blog');

    //Subscribe
    Route::post('/subscribe', 'Subscribe')->name('subscribe');
});
