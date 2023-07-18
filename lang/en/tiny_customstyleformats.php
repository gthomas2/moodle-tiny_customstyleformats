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
 * @package   tiny_customstyleformats
 * @author    Guy Thomas <dev@citri.city>
 * @copyright 2023 Citricity Ltd
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$string['pluginname'] = 'Tiny custom styles';
$string['config_json'] = 'Styles config JSON (array)';
$string['config_json_desc'] = <<<STR
The tiny mce styles configuration JSON that you would like to merge at run time.<br />
NOTE: It should be an array - e.g:<br/>
<pre>
    <code>
    [
        { "title": "Bold text", "inline": "b" },
        { "title": "Red text", "inline": "span", "styles": { "color": "#ff0000" } },
        { "name": "my-inline", "title": "My inline", "inline": "span", "classes": [ "my-inline" ] }
    ]
    </code>
</pre>
STR;
$string['config_json_invalid'] = 'The custom JSON is currently invalid. Try saving this config to see if it fixes it. If not, check your json with a validator - e.g. https://jsonformatter.curiousconcept.com/';