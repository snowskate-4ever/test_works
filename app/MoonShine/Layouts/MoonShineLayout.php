<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};
use App\MoonShine\Resources\ProductResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\DescriptionResource;
use App\MoonShine\Resources\PriceResource;
use App\MoonShine\Resources\PropertyResource;
use App\MoonShine\Resources\ImageResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\CategoryResource;

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn () => __('moonshine::ui.product_group_title'), [
                MenuItem::make(__('moonshine::ui.products.products_title'), ProductResource::class),
                MenuItem::make(__('moonshine::ui.descriptions.descriptions_title'), DescriptionResource::class),
                MenuItem::make(__('moonshine::ui.prices.prices_title'), PriceResource::class),
                MenuItem::make(__('moonshine::ui.properties.properties_title'), PropertyResource::class),
                MenuItem::make(__('moonshine::ui.images.images_title'), ImageResource::class),
                MenuItem::make(__('moonshine::ui.categories.categories_title'), CategoryResource::class),
            ]),
            MenuItem::make(__('moonshine::ui.types.types_title'), TypeResource::class),
            ...parent::menu(),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
