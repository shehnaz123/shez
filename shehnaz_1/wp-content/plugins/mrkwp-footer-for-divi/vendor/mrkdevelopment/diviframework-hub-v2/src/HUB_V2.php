<?php
namespace DF\HUB_V2;

/**
 * HUB_V2.
 */
class HUB_V2
{
    public static $ran = false;

    public static $registered_dependencies = [];

    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Adds the main menu page
     */
    public function add_menu_page()
    {
        if (self::$ran) {
            return;
        }

        self::$ran = true;

        $dependencies = self::get_registered_dependencies();
        

        ob_start();
        include __DIR__ . '/../views/landing.php';
        $landing_html = ob_get_clean();

        add_menu_page(
            'MRK WP',
            'MRK WP',
            'manage_options',
            'df-hub-v2',
            function () use ($landing_html) {
                echo $landing_html;
            },
            'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAUCAYAAACAl21KAAAAAXNSR0IArs4c6QAAAAlwSFlzAAALEwAACxMBAJqcGAAAAVlpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDUuNC4wIj4KICAgPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICAgICAgPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iPgogICAgICAgICA8dGlmZjpPcmllbnRhdGlvbj4xPC90aWZmOk9yaWVudGF0aW9uPgogICAgICA8L3JkZjpEZXNjcmlwdGlvbj4KICAgPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KTMInWQAAAsVJREFUOBFVlDtoVEEUhmfu7gZMloRoIwoWNgoxghAxaLfExspCEnxhEQTxARZBwQdpRS18oEUiNmrlIxo1QiBqGsUHxAgKSQQTQ+IKSSFs4e7m3vH77+4sdwc+zjn/zJw5M3fmGlNtzrkUpBNxO/FgFLkZ7Ezo3EDRuc2J/ozm+Di2CBkv4DfCCfgKb+EgdMMbmIeLkE2Mr8xFDBJiD/FHULvldW/RemEKJmB/Qq/kQNQ2hmEOCvAzcu49th+a/QRZ4la4Sv8C236B3xb342yHBXgM26IoGg7D8FzZuV3Ek/AdDiWTyS8Wi1vRR2AWOrSCgiE/kJVerzh3FE1npURqWmi05NwOP85bdBXwUon+QE4d2BZ4SlV5Ev7gS12vauvw7+MvwTVYnUiUI14MnDGZFWNstaOAbbTWriCc5gTvEW8slUqtKWu1vQOwB74w+ThWbRkaVMUy7JaCbYBxOKmYyiYjF70j1md/WB3Ti87u3SIMwVn5gXNxNRQWN4vIuKgSWLvBGjtOoNX30ddpTMgGzBhsgSm4BC1BbVNEamzLJ1VYhiX4rCA0hrNJKZEpFAq61ZUVcQLOQhP9GbGoSweBji5unHG87QdEc2lrR7Acne1qymYn8FXVefibZoZlJZ85pKIiHWdIkMferlbYhN+H1oW9YK1ZwF6h7yaakvXpgPPgP38zvj7/b+w0F3OALazFXw93QGN1JdYwOW74OY1XoldQdyFJcAwtC3p3/0BPZ7RcLu/0CbxFfwTxhezA0ad8Arr2z0CftBP0PPRID/uJ3qK1gYrQIh2xjtNOeXq089gCdhY+QN0vQ4PRtP3LoO0/h9qj5StUGmI3fALH9m543VvkIzANutk9CT3QCrqElZ8TPfir4BR8gzHQRdwrn/enI6irklh/Sn994gT61dZ+nfhtVHUX+4sEeiKDsClRRZq4Nv4/WB3kGiihtvEAAAAASUVORK5CYII='
        );
    }

    /**
     * Get the list of all the available dependencies.
     *
     * @return [type] [description]
     */
    public static function get_available_dependencies()
    {
        return [
            'acf-pro'      => [
                'name' => 'Advanced Custom Fields Pro',
                'url' => 'https://www.mrkwp.com/acf-pro-KinHirtenanByWegvonvo/',
            ],
            'gravityforms' => [
                'name' => 'Gravityforms',
                'url' => 'https://www.mrkwp.com/gravityforms-oztAgbuewCertenEubzeu/',
            ],
        ];
    }

    /**
     * Register a dependency.
     *
     * @param  [type] $key [description]
     * @return [type] [description]
     */
    public static function register_dependency($key)
    {
        $dependencies = self::get_available_dependencies();
        if (isset($dependencies[$key])) {
            if (!in_array($key, self::$registered_dependencies)) {
                self::$registered_dependencies[] = $key;
            }
        }
    }

    /**
     * Dependencies.
     *
     * @return [type] [description]
     */
    public function get_registered_dependencies()
    {
        $all_dependencies = self::get_available_dependencies();
        $dependencies = [];
        foreach (self::$registered_dependencies as $key) {
            $dependencies[$key] = $all_dependencies[$key];
        }
        return $dependencies;
    }
}