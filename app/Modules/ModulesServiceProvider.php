<?php
/**
 * Created by PhpStorm.
 * User: anastasia
 * Date: 20/11/2018
 * Time: 17:15
 */

namespace App\Modules;

/** * Сервис провайдер для подключения модулей */
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider {

  public function boot() {
      //получаем список модулей, которые надо подгрузить
      $modules = config("module.modules");
      if($modules) {
        foreach($modules as $module) {
              //Подключаем роуты для модуля
              if(file_exists(__DIR__.'/'.$module.'/Routes/routes.php')) {
                  $this->loadRoutesFrom(__DIR__.'/'.$module.'/Routes/routes.php');
              }
              //Загружаем View
              //view('Test::admin')
              if(is_dir(__DIR__.'/'.$module.'/admin/Views')) {
                  $this->loadViewsFrom(__DIR__.'/'.$module.'/admin/Views', $module);
              }
              if(is_dir(__DIR__.'/'.$module.'/public/Views')) {
                  $this->loadViewsFrom(__DIR__.'/'.$module.'/public/Views', $module);
              }
              //Подгружаем миграции
              if(is_dir(__DIR__.'/'.$module.'/Migration')) {
                  $this->loadMigrationsFrom(__DIR__.'/'.$module.'/Migration');
              }
              //Подгружаем переводы
              //trans('Test::messages.welcome')
//              if(is_dir(__DIR__.'/'.$module.'/Lang')) {
//                  $this->loadTranslationsFrom(__DIR__.'/'.$module.'/Lang', $module);
//              }
          }
      }
  }

  public function register() {

  }
}