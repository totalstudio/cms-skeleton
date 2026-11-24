<?php
declare(strict_types=1);

namespace App\Event;

use Cake\Event\EventInterface;
use Cake\Event\EventListenerInterface;
use TSCms\View\Menu\AdminMenu;

/**
 * Admin menu items of the project.
 *
 * The CMS and the plugins register their own items in the same event. Items are addressed by their path (ids
 * joined with dots, at most 3 levels); a project item can go into a group of the CMS or of a plugin too. Only the
 * icon, the position, the visibility or the parent of an existing item can also be changed without code, in the
 * optional `config/studio_admin_menu.php` (`Studio.adminMenu`).
 */
class AdminMenuListener implements EventListenerInterface
{
    /**
     * @inheritDoc
     */
    public function implementedEvents(): array
    {
        return [AdminMenu::EVENT_BUILD => 'buildMenu'];
    }

    /**
     * Registers the menu items of the project.
     *
     * ```
     * $menu->add('reports', __('Reports'), '#', ['icon' => 'bar_chart', 'position' => 50]);
     * $menu->add('reports.sales', __('Sales'), ['prefix' => 'Admin', 'controller' => 'Sales', 'action' => 'index'], [
     *     'urlOtherActions' => ['view'],
     * ]);
     * // into the Settings group of the CMS
     * $menu->add('settings.shops', __('Shops'), ['prefix' => 'Admin', 'controller' => 'Shops', 'action' => 'index']);
     * ```
     *
     * @param \Cake\Event\EventInterface $event The event.
     * @param \TSCms\View\Menu\AdminMenu $menu The menu.
     * @return void
     */
    public function buildMenu(EventInterface $event, AdminMenu $menu): void
    {
    }
}
