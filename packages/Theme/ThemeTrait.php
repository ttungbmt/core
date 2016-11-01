<?php
namespace Lara\Theme;


use Illuminate\Filesystem\FileNotFoundException;

trait ThemeTrait
{
    /**
     * Register custom namespaces for all themes.
     *
     * @return null
     */
    public function register()
    {
        foreach ($this->all() as $theme) {
            $this->registerNamespace($theme);
        }
    }

    /**
     * Register custom namespaces for specified theme.
     *
     * @param string $theme
     * @return null
     */
    public function registerNamespace($theme)
    {
        $signs = ['@'];
        $namespace = static::$namespace.((in_array(static::$namespace, $signs) || strlen(static::$namespace) ==0) ? '' : '.').$theme;

        $hints[] = public_path($this->path($theme)).'/'.'views';


        // Kế thừa 1 cấp
        try {
            // Require public theme config.
            $minorConfigPath = public_path($this->themeConfig['themeDir'] . '/' . $theme . '/config.php');

            $this->themeConfig['themes'][$this->theme] = $this->files->getRequire($minorConfigPath);
        } catch (FileNotFoundException $e) {
            //var_dump($e->getMessage());
        }

        // Inherit from theme name.
        $inherit = collect($this->files->getRequire($minorConfigPath))->get('inherit');

        // This is nice feature to use inherit from another.
        if ($inherit) {
            // Inherit theme path.
            $inheritPath = public_path($this->path($inherit)).'/'.'views';

            if ($this->files->isDirectory($inheritPath)) {
                array_push($hints, $inheritPath);
            }
        }


        $this->view->addNamespace($namespace, $hints);
    }
}