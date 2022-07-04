<?php

namespace Modules\Doctor\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterDoctorSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('doctor::doctors.title.doctors'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('doctor::doctors.title.doctors'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.doctor.create');
                    $item->route('admin.doctor.doctor.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.doctors.index')
                    );
                });
                $item->item(trans('doctor::lichkhams.title.lichkhams'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.doctor.lichkham.create');
                    $item->route('admin.doctor.lichkham.index');
                    $item->authorize(
                        $this->auth->hasAccess('doctor.lichkhams.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
