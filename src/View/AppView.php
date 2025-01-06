<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use TSCms\View\Helper\TsAdminHelper;
use TSCms\View\Helper\TsCellHelper;
use TSCms\View\Helper\TsFormHelper;
use TSCms\View\Helper\TsGoogleEventHelper;
use TSCms\View\Helper\TsHtmlHelper;
use TSCms\View\Helper\TsUploaderHelper;
use TSForms\View\Helper\FormCreatorHelper;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @property TsFormHelper $TsForm
 * @property TsAdminHelper $TsAdmin
 * @property FormCreatorHelper $FormCreator
 * @property TsHtmlHelper $TsHtml
 * @property TsUploaderHelper $TsUploader
 * @property TsGoogleEventHelper $TsGoogleEvent
 * @property TsCellHelper $TsCell
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
    }
}
