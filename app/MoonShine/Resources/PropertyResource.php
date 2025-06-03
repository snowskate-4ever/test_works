<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use Illuminate\Contracts\Database\Eloquent\Builder;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\Support\Enums\Color;

/**
 * @extends ModelResource<Property>
 */
class PropertyResource extends ModelResource
{
    protected string $model = Property::class;

    protected string $title = 'Properties';
    protected bool $createInModal = true;
    protected bool $detailInModal = true;
    protected bool $editInModal = true;
    protected bool $cursorPaginate = true;
    public function getTitle(): string
    {
        return __('moonshine::ui.properties.properties_title');
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make(
                __('moonshine::ui.products.name'),
                'product',
                formatted: static fn (Product $model) => $model->name,
                resource: ProductResource::class,
            )->badge(Color::PURPLE)->sortable(),
            Text::make(__('moonshine::ui.properties.value'), 'value')->sortable(),
            Text::make(__('moonshine::ui.properties.unit'), 'unit')->sortable(),
            Text::make(__('moonshine::ui.properties.slug'), 'slug')->sortable(),
            BelongsTo::make(
                __('moonshine::ui.types.name'),
                'type',
                formatted: static fn (Type $model) => $model->name,
                resource: TypeResource::class,
            )->badge(Color::PURPLE)->sortable(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                Flex::make([
                    BelongsTo::make(
                        __('moonshine::ui.types.name'),
                        'type',
                        formatted: static fn(Type $model) => $model->name,
                        resource: TypeResource::class,
                    )
                        ->creatable()
                        ->valuesQuery(static fn(Builder $q) => $q->select(['id', 'name'])),
                ]),
                Flex::make([
                    BelongsTo::make(
                        __('moonshine::ui.products.name'),
                        'product',
                        formatted: static fn(Product $model) => $model->name,
                        resource: ProductResource::class,
                    )
                        ->creatable()
                        ->valuesQuery(static fn(Builder $q) => $q->select(['id', 'name'])),
                ]),
                Flex::make([
                    Text::make(__('moonshine::ui.properties.value'), 'value'),
                ]),
                Flex::make([
                    Text::make(__('moonshine::ui.properties.unit'), 'unit')->required(),
                ]),
                Flex::make([
                    Text::make(__('moonshine::ui.properties.slug'), 'slug')->required(),
                ]),
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param Property $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
