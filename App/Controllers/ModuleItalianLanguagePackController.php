<?php

declare(strict_types=1);

/*
 * MikoPBX - free phone system for small business
 * Copyright © 2017-2026 Alexey Portnov and Nikolay Beketov
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <https://www.gnu.org/licenses/>.
 */

namespace Modules\ModuleItalianLanguagePack\App\Controllers;

use MikoPBX\AdminCabinet\Controllers\BaseController;
use MikoPBX\Modules\PbxExtensionUtils;

/**
 * ModuleItalianLanguagePackController
 *
 * Controller for Italian Language Pack module information page
 */
class ModuleItalianLanguagePackController extends BaseController
{
    private string $moduleUniqueID = 'ModuleItalianLanguagePack';
    private string $moduleDir;

    /**
     * Basic initialization
     */
    public function initialize(): void
    {
        $this->moduleDir = PbxExtensionUtils::getModuleDir($this->moduleUniqueID);
        parent::initialize();
    }

    /**
     * Renders the information page for the module
     *
     * @return void
     */
    public function indexAction(): void
    {
        $this->view->moduleUniqueID = $this->moduleUniqueID;
        $this->view->moduleDir = $this->moduleDir;

        // Count sound files
        $soundsDir = $this->moduleDir . '/Sounds/it-it';
        $soundFileCount = 0;
        if (is_dir($soundsDir)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($soundsDir, \RecursiveDirectoryIterator::SKIP_DOTS)
            );
            foreach ($files as $file) {
                if ($file->isFile()) {
                    $soundFileCount++;
                }
            }
        }
        $this->view->soundFileCount = $soundFileCount;

        // Count translation files and strings
        $messagesDir = $this->moduleDir . '/Messages/it';
        $translationFileCount = 0;
        $translationStringCount = 0;
        if (is_dir($messagesDir)) {
            $files = scandir($messagesDir);
            foreach ($files as $file) {
                if (is_file($messagesDir . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                    $translationFileCount++;
                    $translations = include $messagesDir . '/' . $file;
                    if (is_array($translations)) {
                        $translationStringCount += count($translations);
                    }
                }
            }
        }
        $this->view->translationFileCount = $translationFileCount;
        $this->view->translationStringCount = $translationStringCount;

        $this->view->pick('Modules/' . $this->moduleUniqueID . '/' . $this->moduleUniqueID . '/index');
    }
}
