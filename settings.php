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

/**
 * Settings that allow turning on and off recordrtc features
 *
 * @package    tiny_customstyleformats
 * @author     Guy Thomas <dev@citri.city>
 * @copyright  2023 Citricity Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Needed for constants.

$ADMIN->add('editortiny', new admin_category('tiny_customstyleformats', new lang_string('pluginname', 'tiny_customstyleformats')));

if ($ADMIN->fulltree) {
    $name = get_string('config_json', 'tiny_customstyleformats');
    $desc = get_string('config_json_desc', 'tiny_customstyleformats');
    $json = get_config('tiny_customstyleformats', 'json');
    if (!empty($json) && empty(json_decode($json))) {
        $desc .= $OUTPUT->notification(get_string('config_json_invalid', 'tiny_customstyleformats'), 'error');
    }
    $setting = new admin_setting_configtextarea('tiny_customstyleformats/json', $name, $desc, '', PARAM_TEXT);
    $settings->add($setting);
}
