<?php

use App\Http\Controllers\APIs\EmployeeController;
use App\Http\Controllers\APIs\ChatController;
use App\Http\Controllers\APIs\DeafController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum", "verified")->get("/user", function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => "v1"], function () {
    Route::group(["prefix" => "employee"], function () {
        Route::group(["prefix" => "auth"], function () {
            Route::post("login", [EmployeeController::class, "login"]);
            Route::post("register", [EmployeeController::class, "register"]);
            Route::get("logout", [EmployeeController::class, "logout"])->middleware(["auth:sanctum", "scopes:user"]);
        });
        Route::group(["prefix" => "profile", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::post("edit", [EmployeeController::class, "edit"]);
            Route::post("image", [EmployeeController::class, "userProfileImage"]);
            Route::get("/", [EmployeeController::class, "profile"]);
        });

        Route::group(["prefix" => "chat", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::get("openChat", [ChatController::class, "openChatForEmployee"]);
            Route::get("endChat", [ChatController::class, "endChatForEmployee"]);
            Route::post("sendMessage", [ChatController::class, "sendMessage"]);
        });
    });

    Route::group(["prefix" => "deaf"], function () {
        Route::group(["prefix" => "auth"], function () {
            Route::post("register", [DeafController::class, "register"]);
        });
        Route::group(["prefix" => "profile", "middleware" => ["auth:sanctum", "scopes:user"]], function () {

        });

        Route::group(["prefix" => "chat", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
            Route::post("scanChat", [ChatController::class, "scanChat"]);
            Route::post("sendMessage", [ChatController::class, "sendMessage"]);
        });
    });


    Route::group(["prefix" => "country"], function () {
        Route::get("search", [CountryController::class, "searchCountries"]);
    });
    Route::group(["prefix" => "nationality"], function () {
        Route::get("search", [NationalityController::class, "searchNationalities"]);
    });
    Route::group(["prefix" => "categories"], function () {
        Route::get("search", [CategoryController::class, "searchCategories"]);
    });

    Route::group(["prefix" => "home"], function () {
        Route::get("home", [HomeController::class, "home"]);
        Route::get("search", [HomeController::class, "search"]);
    });
    Route::group(["prefix" => "contactus"], function () {
        Route::get("all", [ContactController::class, "all"]);
        Route::post("store", [ContactMessageController::class, "store"])->middleware(["auth:sanctum", "verified", "scopes:user"]);
    });
    Route::group(["prefix" => "shop"], function () {
        Route::get("list", [ShopController::class, "list"]);
        Route::get("details", [ShopController::class, "details"]);
        Route::get("category-services", [ShopController::class, "categoryServices"]);
        Route::get("services", [ShopController::class, "services"]);
        Route::post("create-rate", [ShopController::class, "createRate"])->middleware("auth:sanctum", "scopes:user");
        Route::get("rates", [ShopController::class, "shopRates"]);
        Route::get("most-popular", [ShopController::class, "mostPopular"]);
    });
    Route::group(["prefix" => "shopfavourites", "middleware" => ["auth:sanctum", "scopes:user"]], function () {
        Route::get("list", [ShopFavouriteController::class, "list"]);
        Route::post("add", [ShopFavouriteController::class, "add"]);
        Route::post("remove", [ShopFavouriteController::class, "remove"]);
    });
    Route::group(["prefix" => "offer"], function () {
        Route::get("list", [OfferController::class, "list"]);
        Route::get("categories", [OfferController::class, "categories"]);
    });

    Route::group(["prefix" => "settings"], function () {
        Route::get("about", [SettingController::class, "about"]);
        Route::get("term", [SettingController::class, "term"]);
        Route::get("privacy", [SettingController::class, "privacy"]);
    });

    Route::post("saveToken", [NotificationController::class, "saveToken"])->middleware(["auth:sanctum", "scopes:user"]);
    Route::get("notification", [NotificationController::class, "allNotification"])->middleware(["auth:sanctum", "scopes:user"]);

});
