<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'AdminPanel','middleware'=>['isAdmin','auth']], function(){
    Route::get('/','admin\AdminPanelController@index')->name('admin.index');

    Route::get('/read-all-notifications','admin\AdminPanelController@readAllNotifications')->name('admin.notifications.readAll');
    Route::get('/notification/{id}/details','admin\AdminPanelController@notificationDetails')->name('admin.notification.details');


    // admin profile
    Route::get('/my-profile','admin\AdminPanelController@EditProfile')->name('admin.myProfile');
    Route::post('/my-profile','admin\AdminPanelController@UpdateProfile')->name('admin.myProfile.update');
    Route::get('/my-password','admin\AdminPanelController@EditPassword')->name('admin.myPassword');
    Route::post('/my-password','admin\AdminPanelController@UpdatePassword')->name('admin.myPassword.update');
    Route::get('/notifications-settings','admin\AdminPanelController@EditNotificationsSettings')->name('admin.notificationsSettings');
    Route::post('/notifications-settings','admin\AdminPanelController@UpdateNotificationsSettings')->name('admin.notificationsSettings.update');


    // admins & moderators
    Route::group(['prefix'=>'admins'], function(){
        Route::get('/','admin\AdminUsersController@index')->name('admin.adminUsers');
        Route::get('/create','admin\AdminUsersController@create')->name('admin.adminUsers.create');
        Route::post('/create','admin\AdminUsersController@store')->name('admin.adminUsers.store');
        Route::get('/{id}/block/{action}','admin\AdminUsersController@blockAction')->name('admin.adminUsers.block');
        Route::get('/{id}/edit','admin\AdminUsersController@edit')->name('admin.adminUsers.edit');
        Route::post('/{id}/edit','admin\AdminUsersController@update')->name('admin.adminUsers.update');
        Route::get('/{id}/delete','admin\AdminUsersController@delete')->name('admin.adminUsers.delete');
    });
 
    
    // header
    Route::group(['prefix'=>'headers'], function(){
    Route::get('/','admin\HeaderController@index')->name('admin.headers');
    Route::post('/create','admin\HeaderController@store')->name('admin.headers.store');
    Route::post('/{id}/edit','admin\HeaderController@update')->name('admin.headers.update');
    Route::get('/{id}/delete','admin\HeaderController@delete')->name('admin.headers.delete');
    });


    // features header
    Route::group(['prefix'=>'aboutusFeatures'], function(){
    Route::get('/','admin\AboutusFeaturesController@index')->name('admin.aboutusFeatures');
    Route::post('/create','admin\AboutusFeaturesController@store')->name('admin.aboutusFeatures.store');
    Route::post('/{id}/edit','admin\AboutusFeaturesController@update')->name('admin.aboutusFeatures.update');
    Route::get('/{id}/delete','admin\AboutusFeaturesController@delete')->name('admin.aboutusFeatures.delete');
    });

    
    // clients
    Route::group(['prefix'=>'ArcheiveClients'], function(){
        Route::get('/','admin\ClientUsersController@index')->name('admin.clientUsers');
        Route::get('/filter','admin\ClientUsersController@filterClients')->name('admin.filterClients');
        Route::get('/create','admin\ClientUsersController@create')->name('admin.clientUsers.create');
        Route::post('/create','admin\ClientUsersController@store')->name('admin.clientUsers.store');
        Route::get('/{id}/edit','admin\ClientUsersController@edit')->name('admin.clientUsers.edit');
        Route::post('/{id}/edit','admin\ClientUsersController@update')->name('admin.clientUsers.update');
        Route::get('/{id}/delete','admin\ClientUsersController@delete')->name('admin.clientUsers.delete');
    });
    

    // roles & permissions
    Route::group(['prefix'=>'roles'], function(){
        Route::get('/','admin\RolesController@index')->name('admin.roles');
        Route::post('/create','admin\RolesController@store')->name('admin.roles.store');
        Route::post('/{id}/edit','admin\RolesController@update')->name('admin.roles.update');
        Route::get('/{id}/delete','admin\RolesController@delete')->name('admin.roles.delete');
    });


    // settings
    Route::group(['prefix'=>'settings'], function(){
        Route::get('/','admin\SettingsController@generalSettings')->name('admin.settings.general');
        Route::get('/{id}','admin\SettingsController@editSettings')->name('admin.settings.edit');
        Route::post('/','admin\SettingsController@updateSettings')->name('admin.settings.update');
        Route::get('/{key}/deletePhoto','admin\SettingsController@deleteSettingPhoto')->name('admin.settings.deletePhoto');
    });


    // clients
    Route::group(['prefix'=>'clients'], function(){
    Route::get('/','admin\ClientsController@index')->name('admin.clients');
    Route::post('/create','admin\ClientsController@store')->name('admin.clients.store');
    Route::post('/{id}/edit','admin\ClientsController@update')->name('admin.clients.update');
    Route::get('/{id}/delete','admin\ClientsController@delete')->name('admin.clients.delete');
    });


    // Services
    Route::group(['prefix'=>'services'], function(){
    Route::get('/','admin\ServicesController@index')->name('admin.services');
    Route::post('/create','admin\ServicesController@store')->name('admin.services.store');
    Route::post('/{id}/edit','admin\ServicesController@update')->name('admin.services.update');
    Route::get('/{id}/delete','admin\ServicesController@delete')->name('admin.services.delete');
    });
    
    // contacts
    Route::group(['prefix'=>'contacts'], function(){
    Route::get('/','admin\contactsController@index')->name('admin.contacts');
    Route::post('/create','admin\contactsController@store')->name('admin.contacts.store');
    Route::post('/{id}/edit','admin\contactsController@update')->name('admin.contacts.update');
    Route::get('/{id}/delete','admin\contactsController@delete')->name('admin.contacts.delete');
    });

});