<?php

namespace Modules\Medicine\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterMedicineSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('medicine::medicines.title.medicines'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('medicine::medicines.title.medicines'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.medicine.medicine.create');
                    $item->route('admin.medicine.medicine.index');
                    $item->authorize(
                        $this->auth->hasAccess('medicine.medicines.index')
                    );
                });
                $item->item(trans('medicine::manages.title.manages'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.medicine.manage.create');
                    $item->route('admin.medicine.manage.index');
                    $item->authorize(
                        $this->auth->hasAccess('medicine.manages.index')
                    );
                });
// append





            });
        });

        return $menu;
    }
}
