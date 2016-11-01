<?php

return [

    'providers' => [
        // CORE
        Laravel\Socialite\SocialiteServiceProvider::class,
        Laravel\Passport\PassportServiceProvider::class,
        Laravel\Cashier\CashierServiceProvider::class,
        Laravel\Scout\ScoutServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        // Barryvdh\Cors\ServiceProvider::class,

        // MAIN
        Collective\Html\HtmlServiceProvider::class,
        Stolz\Assets\Laravel\ServiceProvider::class,
        Yajra\Datatables\DatatablesServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,

        // SUB
        Laracasts\Utilities\JavaScript\JavaScriptServiceProvider::class,
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
        Laracademy\Generators\GeneratorsServiceProvider::class,
        Watson\Active\ActiveServiceProvider::class,
        Chumper\Zipper\ZipperServiceProvider::class,
        Lord\Laroute\LarouteServiceProvider::class,
        Phaza\LaravelPostgis\DatabaseServiceProvider::class,
        Spatie\Backup\BackupServiceProvider::class,
        Orangehill\Iseed\IseedServiceProvider::class,
        Arrilot\Widgets\ServiceProvider::class,
        RobbieP\CloudConvertLaravel\CloudConvertLaravelServiceProvider::class,

        //  DEVELOP
        Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
        Brotzka\DotenvEditor\DotenvEditorServiceProvider::class,
        PrettyRoutes\ServiceProvider::class,
        Spatie\LinkChecker\LinkCheckerServiceProvider::class,

//        Kodeine\Acl\AclServiceProvider::class,
        Baum\Providers\BaumServiceProvider::class,


        Lara\Theme\ThemeServiceProvider::class,
//        Caffeinated\Themes\ThemesServiceProvider::class,
//        Teepluss\Theme\ThemeServiceProvider::class,
    ],

    'aliases' => [
        'Socialite'   => Laravel\Socialite\Facades\Socialite::class,
        'Debugbar'    => Barryvdh\Debugbar\Facade::class,
        'Datatables'  => Yajra\Datatables\Facades\Datatables::class,
        'Excel'       => Maatwebsite\Excel\Facades\Excel::class,
        'Image'       => Intervention\Image\Facades\Image::class,
        'Widget'      => Arrilot\Widgets\Facade::class,
        'AsyncWidget' => Arrilot\Widgets\AsyncFacade::class,
        'Zipper'      => Chumper\Zipper\Zipper::class,
        'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,
        'Active'      => Watson\Active\Facades\Active::class,
        'DotenvEditor' => Brotzka\DotenvEditor\DotenvEditorFacade::class,

//        'CTheme' => Caffeinated\Themes\Facades\Theme::class,
    ],

];