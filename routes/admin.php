<?php
// routes/admin.php

// Auth Routes
$router->get('/admin/login', 'AuthController@adminLogin');
$router->post('/admin/login', 'AuthController@adminLogin');
$router->get('/admin/logout', 'AuthController@logout');

// Dashboard Routes
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/guide', 'AdminGuideController@index');
$router->post('/admin/upload-image', 'AdminController@uploadImage');
$router->get('/admin/verify', 'AdminController@verifyPin');
$router->post('/admin/verify', 'AdminController@verifyPin');

// Course Routes
$router->get('/admin/courses', 'CourseAdminController@index');
$router->get('/admin/courses/create', 'CourseAdminController@create');
$router->post('/admin/courses/create', 'CourseAdminController@create');
$router->get('/admin/courses/duplicate/{id}', 'CourseAdminController@duplicate');
$router->get('/admin/courses/edit/{id}', 'CourseAdminController@edit');
$router->post('/admin/courses/edit/{id}', 'CourseAdminController@edit');
$router->get('/admin/courses/delete/{id}', 'CourseAdminController@delete');

// Blog Routes
$router->get('/admin/blog', 'BlogAdminController@index');
$router->get('/admin/blog/create', 'BlogAdminController@create');
$router->post('/admin/blog/create', 'BlogAdminController@create');
$router->get('/admin/blog/edit/{id}', 'BlogAdminController@edit');
$router->post('/admin/blog/edit/{id}', 'BlogAdminController@edit');
$router->get('/admin/blog/delete/{id}', 'BlogAdminController@delete');

// User Routes
$router->get('/admin/users', 'UserAdminController@index');
$router->get('/admin/users/create', 'UserAdminController@create');
$router->post('/admin/users/create', 'UserAdminController@create');
$router->get('/admin/users/edit/{id}', 'UserAdminController@edit');
$router->post('/admin/users/edit/{id}', 'UserAdminController@edit');
$router->get('/admin/users/delete/{id}', 'UserAdminController@delete');

// Graduates Routes
$router->get('/admin/graduates', 'GraduateAdminController@index');
$router->get('/admin/graduates/create', 'GraduateAdminController@create');
$router->post('/admin/graduates/create', 'GraduateAdminController@create');
$router->get('/admin/graduates/delete/{id}', 'GraduateAdminController@delete');

// Applications
$router->get('/admin/applications', 'AdminApplicationController@index');
$router->post('/admin/applications/status/{id}', 'AdminApplicationController@updateStatus');

// Documents
$router->get('/admin/documents', 'AdminDocumentsController@index');
$router->post('/admin/documents/{id}/status', 'AdminDocumentsController@updateStatus');



// Messages
$router->get('/admin/messages', 'AdminMessagesController@index');
$router->get('/admin/messages/read/{id}', 'AdminMessagesController@markAsRead');
$router->get('/admin/messages/delete/{id}', 'AdminMessagesController@delete');

// Study Abroad Routes
$router->get('/admin/study-abroad', 'StudyAbroadAdminController@index');
$router->get('/admin/study-abroad/create', 'StudyAbroadAdminController@create');
$router->post('/admin/study-abroad/create', 'StudyAbroadAdminController@create');
$router->get('/admin/study-abroad/edit/{id}', 'StudyAbroadAdminController@edit');
$router->post('/admin/study-abroad/edit/{id}', 'StudyAbroadAdminController@edit');
$router->get('/admin/study-abroad/delete/{id}', 'StudyAbroadAdminController@delete');

// Self Study Routes
$router->get('/admin/self-study', 'SelfStudyAdminController@index');
$router->get('/admin/self-study/create', 'SelfStudyAdminController@create');
$router->post('/admin/self-study/create', 'SelfStudyAdminController@create');
$router->get('/admin/self-study/delete/{id}', 'SelfStudyAdminController@delete');

// Redirect /admin to /admin/dashboard
$router->get('/admin', 'AdminController@dashboard');

// Theme & Pages Builder
$router->get('/admin/theme', 'ThemeAdminController@index');
$router->post('/admin/theme', 'ThemeAdminController@save');
$router->get('/admin/pages', 'PageBuilderController@index');
$router->get('/admin/pages/create', 'PageBuilderController@create');
$router->post('/admin/pages/create', 'PageBuilderController@store');
$router->get('/admin/pages/edit/{id}', 'PageBuilderController@edit');
$router->post('/admin/pages/edit/{id}', 'PageBuilderController@update');
$router->post('/admin/pages/blocks/{id}', 'PageBuilderController@saveBlocks');
$router->get('/admin/pages/delete/{id}', 'PageBuilderController@delete');

// SEO
$router->get('/admin/seo', 'AdminSeoController@index');
$router->post('/admin/seo/save', 'AdminSeoController@save');
