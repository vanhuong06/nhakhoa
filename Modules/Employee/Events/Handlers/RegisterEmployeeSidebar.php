<?php

namespace Modules\Employee\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterEmployeeSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('employee::employees.title.employees'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('employee::employees.title.employees'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.employee.employee.create');
                    $item->route('admin.employee.employee.index');
                    $item->authorize(
                        $this->auth->hasAccess('employee.employees.index')
                    );
                });
                $item->item(trans('employee::times.title.times'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.employee.time.create');
                    $item->route('admin.employee.time.index');
                    $item->authorize(
                        $this->auth->hasAccess('employee.times.index')
                    );
                });
                $item->item(trans('employee::departments.title.departments'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.employee.department.create');
                    $item->route('admin.employee.department.index');
                    $item->authorize(
                        $this->auth->hasAccess('employee.departments.index')
                    );
                });
                $item->item(trans('employee::salaries.title.salaries'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.employee.salary.create');
                    $item->route('admin.employee.salary.index');
                    $item->authorize(
                        $this->auth->hasAccess('employee.salaries.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
