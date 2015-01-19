<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link        http://example.com
 * @since       1.0.0
 * 
 * @package     PluginName
 * @subpackage  PluginName/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since       1.0.0
 * @package     PluginName
 * @subpackage  PluginName/includes
 * @author      Your Name <email@example.com>
 */
class PluginName
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since   1.0.0
     * @access  protected
     * 
     * @var PluginNameLoader   $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since   1.0.0
     * @access  protected
     * 
     * @var string  $pluginName The string used to uniquely identify this plugin.
     */
    protected $pluginName;

    /**
     * The current version of the plugin.
     *
     * @since   1.0.0
     * @access  protected
     * 
     * @var string  $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the Dashboard and
     * the public-facing side of the site.
     *
     * @since   1.0.0
     */
    public function __construct()
    {
        $this->pluginName = 'plugin-name';
        $this->version = '1.0.0';

        $this->loadDependencies();
        $this->setLocale();
        $this->defineSdminHooks();
        $this->definePublicHooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - PluginName_Loader. Orchestrates the hooks of the plugin.
     * - PluginName_i18n. Defines internationalization functionality.
     * - PluginName_Admin. Defines all hooks for the dashboard.
     * - PluginName_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since   1.0.0
     * @access  private
     */
    private function loadDependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) 
            . 'includes/class-plugin-name-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) 
            . 'includes/class-plugin-name-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the Dashboard.
         */
        require_once plugin_dir_path(dirname(__FILE__)) 
            . 'admin/class-plugin-name-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) 
            . 'public/class-plugin-name-public.php';

        $this->loader = new PluginNameLoader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the PluginName_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since   1.0.0
     * @access	private
     */
    private function setLocale()
    {
        $plugin_i18n = new PluginName_i18n();
        $plugin_i18n->setDomain($this->getPluginName());

        $this->loader->addAction('plugins_loaded', $plugin_i18n, 'loadPluginTextdomain');
    }

    /**
     * Register all of the hooks related to the dashboard functionality
     * of the plugin.
     *
     * @since	1.0.0
     * @access	private
     */
    private function defineAdminHooks()
    {
        $plugin_admin = new PluginName_Admin($this->getPluginName(), $this->getVersion());

        $this->loader->addAction(
            'admin_enqueue_scripts', $plugin_admin, 'enqueueStyles'
        );
        $this->loader->addAction(
            'admin_enqueue_scripts', $plugin_admin, 'enqueueScripts'
        );
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since	1.0.0
     * @access  private
     */
    private function definePublicHooks()
    {
        $plugin_public = new PluginNamePublic(
            $this->getPluginName(), $this->getVersion()
        );

        $this->loader->addAction('wp_enqueue_scripts', $plugin_public, 'enqueueStyles');
        $this->loader->addAction('wp_enqueue_scripts', $plugin_public, 'enqueueScripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since   1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since	1.0.0
     * 
     * @return  string  The name of the plugin.
     */
    public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since	1.0.0
     * 
     * @return  PluginName_Loader   Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since	1.0.0
     * 
     * @return  string  The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }

}
