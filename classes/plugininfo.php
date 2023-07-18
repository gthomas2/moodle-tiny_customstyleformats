<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace tiny_customstyleformats;

use context;
use editor_tiny\editor;
use editor_tiny\plugin;
use editor_tiny\plugin_with_configuration;

/**
 * Plugin info
 * @package    tiny_customstyleformats
 * @author     Guy Thomas <dev@citri.city>
 * @copyright  2023 Citricity Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class plugininfo extends plugin implements plugin_with_configuration {

    /**
     * Hacky way for the configuration amd code to access this config early.
     * Note - I tried to get the config for the editor in configuration.js
     * but couldn't work out how to do it easily.
     *
     * @param string $json
     * @return void
     */
    protected static function add_inline_config(string $json) {
        static $done;
        if ($done) {
            return;
        }
        // Test json valid and abort if invalid.
        $obj = json_decode($json);
        if (empty($obj)) {
            echo "<script>console.error('json bad for custom style formats tiny plugin');</script>";
            $done = true;
            return;
        }
        echo "<script>const tiny_plugin_customstyleformats = $json;</script>";
        $done = true;
    }
    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?editor $editor = null
    ): array {
        $json = get_config('tiny_customstyleformats', 'json');
        $returnvar = ['json' => []];
        if (!$json) {
            return $returnvar;
        } else {
            try {
                $returnvar['json'] = (array) json_decode($json);
                self::add_inline_config($json);
                return $returnvar;
            } catch (\Exception $e) {
                return $returnvar;
            }
        }
    }
}
