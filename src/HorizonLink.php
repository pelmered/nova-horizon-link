<?php
namespace Alexpgates\HorizonLink;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class HorizonLink extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('horizon-link', __DIR__.'/../dist/js/tool.js');
        // Nova::style('horizon-link', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request): mixed
    {
        $menu = MenuItem::externalLink('HorizonLink', route('horizon.index'))->openInNewTab();
        $menu->component = 'menu-section';
        return $menu;
        return MenuSection::make('HorizonLink')
            ->path('/horizon-link')
            ->icon('currency-dollar');
    }
}
