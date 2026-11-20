<?php
// routes/web.php

$router->get('/', 'HomeController@index');

// Contact Routes
$router->get('/contact', 'ContactController@index');
$router->post('/contact', 'ContactController@submit');

// Admin Web Routes
$router->get('/admin/login', 'AuthController@adminLogin');
$router->post('/admin/login', 'AuthController@adminLogin');
$router->get('/admin/logout', 'AuthController@logout');

$router->get('/admin/verify', 'AdminController@verifyPin');
$router->post('/admin/verify', 'AdminController@verifyPin');
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->get('/admin/live-chat', 'AdminController@liveChat');
$router->get('/admin/security', 'AdminController@security');
$router->get('/admin/logs', 'AdminController@systemLogs');
$router->get('/admin/bookings', 'AdminBookingController@index');
$router->get('/admin/bookings/approve/{id}', 'AdminBookingController@approve');
$router->get('/admin/bookings/delete/{id}', 'AdminBookingController@delete');
$router->get('/logout', 'AuthController@logout');

// Admin Study Abroad Routes
$router->get('/admin/countries', 'AdminCountryController@index');
$router->post('/admin/countries/save', 'AdminCountryController@save');
$router->get('/admin/countries/delete/{id}', 'AdminCountryController@delete');

$router->get('/admin/universities', 'AdminUniversityController@index');
$router->post('/admin/universities/save', 'AdminUniversityController@save');
$router->get('/admin/universities/delete/{id}', 'AdminUniversityController@delete');
$router->post('/admin/universities/reorder', 'AdminUniversityController@reorder');

$router->get('/admin/graduates', 'AdminGraduateController@index');
$router->post('/admin/graduates/save', 'AdminGraduateController@save');
$router->get('/admin/graduates/delete/{id}', 'AdminGraduateController@delete');
$router->post('/admin/graduates/reorder', 'AdminGraduateController@reorder');
// Auth Routes (Frontend)
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');

// Profile Routes
$router->get('/profile', 'ProfileController@index');
$router->post('/profile', 'ProfileController@index');
$router->post('/profile/upload-document', 'ProfileController@uploadDocument');
$router->get('/profile/delete-document/{id}', 'ProfileController@deleteDocument');
$router->post('/profile/book', 'ProfileController@bookConsultation');
$router->post('/profile/link-student', 'ProfileController@linkStudent');

// Applications
$router->post('/apply', 'ApplicationController@apply');

// 7-step Booking
$router->get('/book', 'BookingController@index');
$router->get('/booking', 'BookingController@index');
$router->post('/book/submit', 'BookingController@submit');
$router->post('/booking/submit', 'BookingController@submit');

// SEO Routes
$router->get('/sitemap.xml', 'SeoController@sitemap');
$router->get('/robots.txt', 'SeoController@robots');

// Content Pages
$router->get('/about', 'PageController@about');
$router->get('/education', 'PageController@education');
$router->get('/courses', 'PageController@education');
$router->get('/education/{slug}', 'CourseController@show');
$router->get('/courses/{slug}', 'CourseController@show');

$router->get('/study-abroad', 'StudyAbroadController@index');
$router->get('/study-abroad/university/{id}', 'StudyAbroadController@show');

$router->get('/creation-lab', 'PageController@creationLab');
$router->get('/parents', 'PageController@parents');
// Ecosystem & App Pages
$router->get('/thrive-mobile', 'PageController@thriveMobile');
$router->get('/thrive-portal', 'PageController@thrivePortal');
$router->get('/thriveportal', 'PageController@thrivePortal');
$router->get('/thrive-prep', 'PageController@thrivePrep');
$router->get('/thriveprep', 'PageController@thrivePrep');
$router->get('/self-study', 'PageController@thrivePrep');
$router->get('/self-study/{id}', 'PageController@thrivePrep');

$router->get('/graduates', 'PageController@graduates');
$router->get('/blog', 'BlogController@index');
$router->get('/blog/{slug}', 'BlogController@show');

// Legal Pages
$router->get('/privacy-policy', 'PageController@privacy');
$router->get('/terms-of-service', 'PageController@terms');
$router->get('/cookie-policy', 'PageController@cookie');

