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
//frontend
Route::group(['prefix' => '/','namespace' => 'Frontend'],function(){
    Route::get('/',['as' => 'index','uses' => 'MainController@getIndex']);
    
    Route::get('gioi-thieu.html',['as' => 'getIntroIndex','uses' => 'StaticsController@getIntroIndex']);    
    Route::get('huong-dan-mua-hang.html',['as' => 'getBuyIndex','uses' => 'StaticsController@getBuyIndex']);
    Route::get('huong-dan-thanh-toan.html',['as' => 'getOrderIndex','uses' => 'StaticsController@getOrderIndex']);
     Route::get('lien-he.html',['as' => 'getContactIndex','uses' => 'ContactController@getContactIndex']);
    Route::post('lien-he.html',['as' => 'postContactIndex','uses' => 'ContactController@postContactIndex']);

    Route::get('tim-kiem',['as' => 'frontend.search','uses' => 'SearchController@getSearchList']);
    Route::get('tim-kiem/autocomplete', 'SearchController@autocomplete');
    
    Route::get('tin-tuc.html',['as' => 'getNewsIndex','uses' => 'NewsController@getNewsIndex']);
    Route::get('tin-tuc/{id}/{alias}',['as' => 'getNewsDetail','uses' => 'NewsController@getNewsDetail'])->where('id','[0-9]+');
    
    Route::get('dich-vu.html',['as' => 'getServiceIndex','uses' => 'ServiceController@getServiceIndex']);
    Route::get('chinh-sach-bao-hanh.html',['as' => 'getMaintenanceIndex','uses' => 'MaintenanceController@getMaintenanceIndex']);
    
    //shopping cart
    Route::get('mua-hang/{id}/{tensanpham}',['as' => 'getBuyProduct','uses' => 'CartController@getBuyProduct']);


    Route::get('gio-hang',['as' => 'getCartList','uses' => 'CartController@getCartList']);
    Route::get('xoa-san-pham/{id}',['as' => 'getCartDel','uses' => 'CartController@getCartDel']);
    Route::get('xoa-sp/{id}',['as' => 'getCartDel1','uses' => 'CartController@getCartDel1']);
    Route::get('cap-nhat/{id}/{qty}',['as' => 'getCartUpdate','uses' => 'CartController@getCartUpdate']);
    Route::post('cap-nhat-voucher/{id}/{voucher}/{product_option_id}',['as' => 'getCartUpdateVoucher','uses' => 'CartController@getCartUpdateVoucher']);
    Route::post('cap-nhat-don-hang/',['as' => 'postCartUpdate','uses' => 'CartController@postCartUpdate']);
    //
    Route::post('cap-nhat-gia',['as' => 'getUpdatePrice','uses' => 'CartController@getUpdatePrice']);
    Route::post('cap-nhat-so-luong',['as' => 'getUpdateQty','uses' => 'CartController@getUpdateQty']);
    //
    Route::post('get-total-cart',['as' => 'getTotalCart','uses' => 'CartController@getTotalCart']);
    Route::get('dat-hang',['as' => 'getCartOrderComplete','uses' => 'CartController@getCartOrderComplete']);
    Route::post('dat-hang',['as' => 'postCartOrderComplete','uses' => 'CartController@postCartOrderComplete']);


    Route::get('mua-ngay/{id}/{tensanpham}',['as' => 'getBuyNow','uses' => 'CartController@getBuyNow']);
    
    Route::post('mua-ngay/{id}/{tensanpham}',['as' => 'postBuyNow','uses' => 'CartController@postBuyNow']);
    
    Route::get('duoi-3-trieu',['as' => 'get1Filter','uses' => 'FilterController@get1Filter']);
    Route::get('tu-3-5-trieu',['as' => 'get2Filter','uses' => 'FilterController@get2Filter']);
    Route::get('tren-5-trieu',['as' => 'get3Filter','uses' => 'FilterController@get3Filter']);

    Route::get('tat-ca-san-pham',['as' => 'getProductAll','uses' => 'ProductController@getProductAll']);
    Route::get('san-pham-moi',['as' => 'getProductNew','uses' => 'ProductController@getProductNew']);
    Route::get('san-pham-noi-bat',['as' => 'getProductTop','uses' => 'ProductController@getProductTop']);
    Route::get('san-pham-khuyen-mai',['as' => 'getProductSales','uses' => 'ProductController@getProductSales']);
    Route::get('san-pham/{alias}',['as' => 'getProductDetail','uses' => 'ProductController@getProductDetail']);

    Route::post('posts', 'ProductController@postRating')->name('posts.post');
    Route::get('delete-posts/{id_rating}', 'ProductController@deleteRating')->name('delete.post');
    //Route::get('danh-muc-san-pham/{alias}',['as' => 'getProductType','uses' => 'ProductController@getProductType']);
    Route::get('{alias}.html',['as' => 'getProductType','uses' => 'ProductController@getProductType']);

    // Route::post('/message/send', ['uses' => 'FrontController@addFeedback', 'as' => 'front.fb']);


    
    
    

   

}); 
//Route::get('/', function () {
//    return view('welcome');
//});
//admin
Route::get('vnclogin',['as' => 'getLogin','uses' => 'LoginController@getLogin' ] );
Route::post('vnclogin',['as' => 'postLogin','uses' => 'LoginController@postLogin' ] );
Route::get('logout',['as' => 'getLogout','uses' => 'LoginController@getLogout' ] );


//forget password
Route::get('/forgot-password', function () {
    return view('admin.module.reset_password.forget_password');
})->middleware('guest')->name('forgot_password');

//forget password
Route::post('forgot-password',['as' => 'post_forgot_password','uses' => 'LoginController@sendMailReset' ] );
Route::get('reset-password/{token}',['as' => 'reset_password','uses' => 'LoginController@resetPassword' ] );
Route::post('post-reset-password/{token}',['as' => 'post_reset_password','uses' => 'LoginController@postResetPassword' ] );

Route::get('/register', 'Admin\RegistrationController@create')->name('register');
Route::post('/register/create', 'Admin\RegistrationController@store')->name('post_register');



Route::group(['prefix' => 'login'],function(){


    Route::group(['prefix' => 'google'],function(){
        Route::get('/','Admin\LoginThirdPartyController@redirectToGoogle')->name('login.google');
        Route::get('/callback','Admin\LoginThirdPartyController@googleCallback')->name('login.googleCallback');
    });
    
    Route::group(['prefix' => 'facebook'],function(){
        Route::get('/','Admin\LoginThirdPartyController@redirectToFace')->name('login.face');
        Route::get('/callback','Admin\LoginThirdPartyController@faceCallback')->name('login.faceCallback');
    });
    Route::get('/info-third-party-first-login','Admin\LoginThirdPartyController@getInfoUser')->name('login.info_user');
    Route::get('/update-info-third-party-first-login','Admin\LoginThirdPartyController@editInfoUser')->name('login.edit_info_user');
    Route::post('/update-info-third-party-first-login','Admin\LoginThirdPartyController@updateInfoUser')->name('login.update_info_user');
    Route::get('/get-district/{id}','Admin\LoginThirdPartyController@getDistrictByIdProvince')->name('login.get_district_by_id_province');
    Route::get('/get-ward/{id}','Admin\LoginThirdPartyController@getWardByIdDistrict')->name('login.get_district_by_id_province');


    Route::get('/abc','Admin\LoginThirdPartyController@sendMailResetPassword')->name('login.get_district_by_id_province');

    

});



Route::group(['middleware' => ['auth', 'check_update_info']], function () {   
    Route::group(['prefix' => 'vncadmin','namespace' => 'Admin'],function(){    	
    	Route::get('/',function(){
    		return redirect()->route('getOrderList');
    	});
        
        

        Route::get('backupcustomer','BackupController@backupcustomer')->name('admin.backupcustomer');
        Route::get('backupcustomerID','BackupController@backupcustomerID')->name('admin.backupcustomerID');
    	
    	Route::get('changepw/{id}','ChangePWController@getChange')->name('admin.changepw');
        Route::post('changepw/{id}','ChangePWController@postChange')->name('admin.changepw');
    	
    	
    	Route::group(['prefix' => 'user'],function(){
    		Route::get('add',['as' => 'getUserAdd','uses' => 'UserController@getUserAdd']);
    		Route::post('add',['as' => 'postUserAdd','uses' => 'UserController@postUserAdd']);
    		Route::get('list',['as' => 'getUserList','uses' => 'UserController@getUserList']);
    		Route::get('delete/{id}',['as' => 'getUserDelete','uses' => 'UserController@getUserDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getUserEdit','uses' => 'UserController@getUserEdit'])->where('id','[0-9]+');
    		Route::post('edit/{id}',['as' => 'postUserEdit','uses' => 'UserController@postUserEdit'])->where('id','[0-9]+');
    		Route::get('view/{id}',['as' => 'getUserView','uses' => 'UserController@getUserView'])->where('id','[0-9]+');
    	});
    	Route::group(['prefix' => 'category'],function(){
    		Route::get('add',['as' => 'getCateAdd','uses' => 'CateController@getCateAdd']);
    		Route::post('add',['as' => 'postCateAdd','uses' => 'CateController@postCateAdd']);
    		Route::get('list',['as' => 'getCateList','uses' => 'CateController@getCateList']);
    		Route::get('delete/{id}',['as' => 'getCateDelete','uses' => 'CateController@getCateDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getCateEdit','uses' => 'CateController@getCateEdit'])->where('id','[0-9]+');
    		Route::post('edit/',['as' => 'postCateEdit','uses' => 'CateController@postCateEdit'])->where('id','[0-9]+');
    	});
        Route::group(['prefix' => 'accessory'],function(){
    		Route::get('add',['as' => 'getAccessoryAdd','uses' => 'AccessoryController@getAccessoryAdd']);
    		Route::post('add',['as' => 'postAccessoryAdd','uses' => 'AccessoryController@postAccessoryAdd']);
    		Route::get('list',['as' => 'getListAccessory','uses' => 'AccessoryController@getListAccessory']);
    		Route::get('delete/{id}',['as' => 'getAccessoryDelete','uses' => 'AccessoryController@getAccessoryDelete'])->where('id','[0-9]+');
    	});

        Route::group(['prefix' => 'color'],function(){
    		Route::get('add',['as' => 'getColorAdd','uses' => 'ColorController@getColorAdd']);
    		Route::post('add',['as' => 'postColorAdd','uses' => 'ColorController@postColorAdd']);
    		Route::get('list',['as' => 'getListColor','uses' => 'ColorController@getListColor']);
    		Route::get('delete/{id}',['as' => 'getColorDelete','uses' => 'ColorController@getColorDelete'])->where('id','[0-9]+');
    	});

        Route::group(['prefix' => 'voucher'],function(){
    		Route::get('add',['as' => 'getVoucherAdd','uses' => 'VoucherController@getVoucherAdd']);
    		Route::post('add',['as' => 'postVoucherAdd','uses' => 'VoucherController@postVoucherAdd']);
    		Route::get('list',['as' => 'getListVoucher','uses' => 'VoucherController@getListVoucher']);
    		Route::get('delete/{id}',['as' => 'getVoucherDelete','uses' => 'VoucherController@getVoucherDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getVoucherEdit','uses' => 'VoucherController@getVoucherEdit'])->where('id','[0-9]+');
    		Route::post('edit/',['as' => 'postVoucherEdit','uses' => 'VoucherController@postVoucherEdit'])->where('id','[0-9]+');
    	});

        Route::group(['prefix' => 'service-customer'],function(){
    		Route::get('add',['as' => 'getServiceCustomerAdd','uses' => 'ServiceCustomerController@getServiceCustomerAdd']);
    		Route::post('add',['as' => 'postServiceCustomerAdd','uses' => 'ServiceCustomerController@postServiceCustomerAdd']);
    		Route::get('list',['as' => 'getListServiceCustomer','uses' => 'ServiceCustomerController@getListServiceCustomer']);
    		Route::get('delete/{id}',['as' => 'getServiceCustomerDelete','uses' => 'ServiceCustomerController@getServiceCustomerDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getServiceCustomerEdit','uses' => 'ServiceCustomerController@getServiceCustomerEdit'])->where('id','[0-9]+');
    		Route::post('edit/{id}',['as' => 'postServiceCustomerEdit','uses' => 'ServiceCustomerController@postServiceCustomerEdit'])->where('id','[0-9]+');
            Route::get('add-product-order/{id_service_customer}',['as' => 'addItem','uses' => 'ServiceCustomerController@addItem']);
            Route::post('add-product-order/{id_service_customer}',['as' => 'postAddItem','uses' => 'ServiceCustomerController@postAddItem']);
    		Route::get('delete-detail/{id_service_customer_detail}',['as' => 'getServiceCustomerDetailDelete','uses' => 'ServiceCustomerController@getServiceCustomerDetailDelete'])->where('id','[0-9]+');

        });

            Route::group(['prefix' => 'maintenance-customer'],function(){
    		Route::get('add/{id}',['as' => 'getMaintenanceCustomerAdd','uses' => 'MaintenanceCustomerController@getMaintenanceCustomerAdd']);
    		Route::post('add/{id}',['as' => 'postMaintenanceCustomerAdd','uses' => 'MaintenanceCustomerController@postMaintenanceCustomerAdd']);
    		Route::get('list',['as' => 'getListMaintenanceCustomer','uses' => 'MaintenanceCustomerController@getListMaintenanceCustomer']);
    		Route::get('delete/{id}',['as' => 'getMaintenanceCustomerDelete','uses' => 'MaintenanceCustomerController@getMaintenanceCustomerDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getMaintenanceCustomerEdit','uses' => 'MaintenanceCustomerController@getMaintenanceCustomerEdit'])->where('id','[0-9]+');
    		Route::post('edit/{id}',['as' => 'postMaintenanceCustomerEdit','uses' => 'MaintenanceCustomerController@postMaintenanceCustomerEdit'])->where('id','[0-9]+');
            Route::get('add-product-order/{id}',['as' => 'addItemMaintenance','uses' => 'MaintenanceCustomerController@addItem']);
            Route::post('add-product-order/{id}',['as' => 'postAddItemMaintenance','uses' => 'MaintenanceCustomerController@postAddItem']);
    		Route::get('delete-detail/{id}',['as' => 'getMaintenanceCustomerDetailDelete','uses' => 'MaintenanceCustomerController@getMaintenanceCustomerDetailDelete'])->where('id','[0-9]+');
            Route::get('export-pdf/{id}',['as' => 'export_pdf_maintenance','uses' => 'MaintenanceCustomerController@exportPdf']);
        });

    	Route::group(['prefix' => 'news'],function(){
    		Route::get('add',['as' => 'getNewsAdd','uses' => 'NewsController@getNewsAdd']);
    		Route::post('add',['as' => 'postNewsAdd','uses' => 'NewsController@postNewsAdd']);
    		Route::get('list',['as' => 'getNewsList','uses' => 'NewsController@getNewsList']);
    		Route::get('delete/{id}',['as' => 'getNewsDelete','uses' => 'NewsController@getNewsDelete'])->where('id','[0-9]+');
    		Route::get('edit/{id}',['as' => 'getNewsEdit','uses' => 'NewsController@getNewsEdit'])->where('id','[0-9]+');
    		Route::post('edit/{id}',['as' => 'postNewsEdit','uses' => 'NewsController@postNewsEdit'])->where('id','[0-9]+');
    	});
    	Route::group(['prefix' => 'product'],function(){
    		Route::get('add',['as' => 'getProductAdd','uses' => 'ProductController@getProductAdd']);
    		Route::post('add',['as' => 'postProductAdd','uses' => 'ProductController@postProductAdd']);
    		Route::get('list',['as' => 'getProductList','uses' => 'ProductController@getProductList']);
    		Route::get('list-approve',['as' => 'getProductListApprove','uses' => 'ProductController@getProductListApprove']);
    		Route::get('list-approve-user',['as' => 'getProductListApproveUser','uses' => 'ProductController@getProductListApproveUser']);
    		Route::get('view-approve/{id}/{pro_id}',['as' => 'getProductViewApprove','uses' => 'ProductController@getProductViewApprove']);
    		Route::post('view-approve/{id}/{pro_id}',['as' => 'postProductViewApprove','uses' => 'ProductController@postProductViewApprove']);
            Route::get('delete/{id}',['as' => 'getProductDelete','uses' => 'ProductController@getProductDelete'])->where('id','[0-9]+');
            Route::get('edit/{id}',['as' => 'getProductEdit','uses' => 'ProductController@getProductEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}',['as' => 'postProductEdit','uses' => 'ProductController@postProductEdit'])->where('id','[0-9]+');
    	});
        Route::group(['prefix' => 'productimage'],function(){       
            Route::get('list/{id}',['as' => 'getProductImagetList','uses' => 'ProductImageController@getProductImagetList']);
            Route::get('delete/{id}',['as' => 'getProductImageDelete','uses' => 'ProductImageController@getProductImageDelete'])->where('id','[0-9]+');
        });
        Route::group(['prefix' => 'productoption'],function(){       
            Route::get('list/{id}',['as' => 'getProductOptionList','uses' => 'ProductOptionController@getProductOptionList']);
            Route::get('add/{id}',['as' => 'getProductOptionAdd','uses' => 'ProductOptionController@getProductOptionAdd']);
            Route::post('add/{id}',['as' => 'postProductOptionAdd','uses' => 'ProductOptionController@postProductOptionAdd']);
            Route::get('delete/{id}',['as' => 'getProductOptionDelete','uses' => 'ProductOptionController@getProductOptionDelete'])->where('id','[0-9]+');
            Route::get('edit/{id}/{pro_id}',['as' => 'getProductOptionEdit','uses' => 'ProductOptionController@getProductOptionEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}/{pro_id}',['as' => 'postProductOptionEdit','uses' => 'ProductOptionController@postProductOptionEdit'])->where('id','[0-9]+');
            Route::get('search-product-option',['as' => 'searchProductOption','uses' => 'ProductOptionController@searchProductOption']);
            Route::get('get-price-product-option/{id_product_option}',['as' => 'getPriceProductOption','uses' => 'ProductOptionController@getPriceProductOption']);
            
            //mau sac
            Route::get('add-color-detail/{id_product_option}',['as' => 'getAddColorDetail','uses' => 'ProductOptionController@getAddColorDetail']);
            Route::post('add-color-detail/{id_product_option}',['as' => 'postAddColorDetail','uses' => 'ProductOptionController@postAddColorDetail']);
            Route::get('edit-color-detail/{id_product_option}/{id_color_detail}',['as' => 'getEditColorDetail','uses' => 'ProductOptionController@getEditColorDetail']);
            Route::post('edit-color-detail/{id_product_option}/{id_color_detail}',['as' => 'postEditColorDetail','uses' => 'ProductOptionController@postEditColorDetail']);
            Route::get('delete-color-detail/{id_product_option}/{id_color_detail}',['as' => 'getDeleteColorDetail','uses' => 'ProductOptionController@getDeleteColorDetail']);
            
            // phu kien
            Route::get('add-accessory-detail/{id_product_option}',['as' => 'getAddAccessoryDetail','uses' => 'ProductOptionController@getAddAccessoryDetail']);
            Route::post('add-accessory-detail/{id_product_option}',['as' => 'postAddAccessoryDetail','uses' => 'ProductOptionController@postAddAccessoryDetail']);
            Route::get('edit-accessory-detail/{id_product_option}/{id_accessory_detail}',['as' => 'getEditAccessoryDetail','uses' => 'ProductOptionController@getEditAccessoryDetail']);
            Route::post('edit-accessory-detail/{id_product_option}/{id_accessory_detail}',['as' => 'postEditAccessoryDetail','uses' => 'ProductOptionController@postEditAccessoryDetail']);
            Route::get('delete-accessory-detail/{id_product_option}/{id_accessory_detail}',['as' => 'getDeleteAccessoryDetail','uses' => 'ProductOptionController@getDeleteAccessoryDetail']);
        });

        Route::group(['prefix' => 'statics'],function(){       
            Route::get('list',['as' => 'getStaticsList','uses' => 'StaticsController@getStaticsList']);
            Route::get('edit/{id}',['as' => 'getStaticsEdit','uses' => 'StaticsController@getStaticsEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}',['as' => 'postStaticsEdit','uses' => 'StaticsController@postStaticsEdit'])->where('id','[0-9]+');                       
        });
        
        Route::group(['prefix' => 'show-chart'],function(){       
            Route::get('view',['as' => 'getChartSale','uses' => 'ChartSaleController@getChartSale']);
        });
        
        Route::group(['prefix' => 'support'],function(){       
            Route::get('list',['as' => 'getSupportList','uses' => 'SupportController@getSupportList']);
            Route::get('edit/{id}',['as' => 'getSupportEdit','uses' => 'SupportController@getSupportEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}',['as' => 'postSupportEdit','uses' => 'SupportController@postSupportEdit'])->where('id','[0-9]+');                       
        });
        Route::group(['prefix' => 'images'],function(){       
            Route::get('list',['as' => 'getImagetList','uses' => 'ImageController@getImagetList']);
            Route::get('edit/{id}',['as' => 'getImageEdit','uses' => 'ImageController@getImageEdit'])->where('id','[0-9]+');
            Route::post('edit/{id}',['as' => 'postImageEdit','uses' => 'ImageController@postImageEdit'])->where('id','[0-9]+');                       
        });
        Route::group(['prefix' => 'order'],function(){       
            Route::get('list',['as' => 'getOrderList','uses' => 'OrderController@getOrderList']);
            // Route::get('create-order',['as' => 'createOrder','uses' => 'OrderController@createOrder']);
            Route::get('create-order',['as' => 'createOrder','uses' => 'OrderController@createOrder']);
            Route::post('create-order',['as' => 'createOrder','uses' => 'OrderController@postCreateOrder']);
            Route::post('add-product-order/{id_order}',['as' => 'addProductOrder','uses' => 'OrderController@addProductOrder']);
            Route::get('cancel-order-draft',['as' => 'cancelOrderDraft','uses' => 'OrderController@cancelOrderDraft']);
            Route::get('delete-order-detail/{id_order_detail}',['as' => 'deleteOrderDetail','uses' => 'OrderController@deleteOrderDetail']);
            Route::get('view/{id}',['as' => 'getOrderDetail','uses' => 'OrderController@getOrderDetail']);
            Route::post('view/{id}',['as' => 'postOrderDetail','uses' => 'OrderController@postOrderDetail']);
            Route::get('delete/{id}',['as' => 'getOrderDelete','uses' => 'OrderController@getOrderDelete']);
            Route::get('complete/{id}',['as' => 'getOrderComplete','uses' => 'OrderController@getOrderComplete']);
            Route::post('update/{id}',['as' => 'getOrderUpdate','uses' => 'OrderController@getOrderUpdate']);
            Route::get('detail/{id}',['as' => 'viewOrder','uses' => 'OrderController@viewOrder']);
            Route::post('update-order/{id}',['as' => 'postUpdateOrderDetail','uses' => 'OrderController@postUpdateOrderDetail']);
            Route::post('update-user/{id}',['as' => 'UpdateUser','uses' => 'OrderController@UpdateUser']);
            Route::get('update_dealer',['as' => 'update_dealer','uses' => 'OrderController@update_dealer']);
            Route::get('export-pdf/{order_id}',['as' => 'export_pdf','uses' => 'OrderController@exportPdf']);

            Route::get('bonus',['as' => 'getBonusOrder','uses' => 'OrderController@getBonusOrder']);
            Route::post('bonusUpdate',['as' => 'postUpdateBonus','uses' => 'OrderController@postUpdateBonus']);
        });
        Route::group(['prefix' => 'contact'],function(){       
            Route::get('list',['as' => 'getContactList','uses' => 'ContactController@getContactList']);
            Route::get('delete/{id}',['as' => 'getContactDelete','uses' => 'ContactController@getContactDelete'])->where('id','[0-9]+');
            Route::get('view/{id}',['as' => 'getContactView','uses' => 'ContactController@getContactView'])->where('id','[0-9]+');                       
        }); 
        
        Route::group(['prefix' => 'service'],function(){            
            Route::get('edit/',['as' => 'getServiceEdit','uses' => 'ServiceController@getServiceEdit'])->where('id','[0-9]+');
            Route::post('edit/',['as' => 'postServiceEdit','uses' => 'ServiceController@postServiceEdit'])->where('id','[0-9]+');                       
        });
        Route::group(['prefix' => 'maintenance'],function(){            
            Route::get('edit/',['as' => 'getMaintenanceEdit','uses' => 'MaintenanceController@getMaintenanceEdit'])->where('id','[0-9]+');
            Route::post('edit/',['as' => 'postMaintenanceEdit','uses' => 'MaintenanceController@postMaintenanceEdit'])->where('id','[0-9]+');                       
        });
    });
});