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
/* global tiny_plugin_customstyleformats:readonly */

/**
 * Tiny custom style formats configuration.
 *
 * @module      tiny_customstyleformats/configuration
 * @copyright   Citricity Ltd <dev@citri.city>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export const configure = (instanceConfig) => {
    if (typeof tiny_plugin_customstyleformats !== 'undefined') {
        instanceConfig.style_formats = tiny_plugin_customstyleformats;
    } else {
        return;
    }

    // Update the instance configuration with custom style formats.
    const toolbar = instanceConfig.toolbar.map((section) => {
        if (section.name === 'content') {
            section.items.push('styles');
        }
        return section;
    });
    return {...instanceConfig, toolbar};
};
