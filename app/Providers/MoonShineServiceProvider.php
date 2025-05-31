<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\DescriptionResource;
use App\MoonShine\Resources\PriceResource;
use App\MoonShine\Resources\PropertyResource;
use App\MoonShine\Resources\ImageResource;
use App\MoonShine\Resources\TypeResource;
use App\MoonShine\Resources\CategoryResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                ProductResource::class,
                DescriptionResource::class,
                PriceResource::class,
                PropertyResource::class,
                ImageResource::class,
                TypeResource::class,
                CategoryResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
