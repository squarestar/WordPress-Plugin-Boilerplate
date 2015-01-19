<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link        http://example.com
 * @since       1.0.0
 * 
 * @package     PluginName
 * @subpackage  PluginName/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package     PluginName
 * @subpackage  PluginName/admin
 * @author      Your Name <email@example.com>
 */
class PluginNameAdmin
{
    /**
     * The ID of this plugin.
     *
     * @since   1.0.0
     * @access  private
     * 
     * @var string  $pluginName The ID of this plugin.
     */
    private $pluginName;

    /**
     * The version of this plugin.
     *
     * @since   1.0.0
     * @access  private
     * 
     * @var string  $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since   1.0.0
     * 
     * @param   string  $pluginName The name of this plugin.
     * @param   string  $version    The version of this plugin.
     */
    public function __construct($pluginName, $version)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the Dashboard.
     *
     * @since   1.0.0
     */
    public function enqueueStyles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PluginName_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The PluginName_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style(
            $this->pluginName, plugin_dir_url(__FILE__) . 'css/plugin-name-admin.css', 
            array(), $this->version, 'all'
        );
    }

    /**
     * Register the JavaScript for the dashboard.
     *
     * @since   1.0.0
     */
    public function enqueueScripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PluginName_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The PluginName_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script(
            $this->pluginName, plugin_dir_url(__FILE__) . 'js/plugin-name-admin.js', 
            array('jquery'), $this->version, false
        );
    }

}
