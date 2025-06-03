<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\MoonShine\Pages\Product\ProductIndexPage;
use App\MoonShine\Pages\Product\ProductFormPage;
use App\MoonShine\Pages\Product\ProductDetailPage;

use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Support\Enums\Color;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Product, ProductIndexPage, ProductFormPage, ProductDetailPage>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;
    protected string $title = 'Products';
    protected string $column = 'name';
    protected bool $createInModal = true;
    protected bool $detailInModal = true;
    protected bool $editInModal = true;
    protected bool $cursorPaginate = true;
    public function getTitle(): string
    {
        return __('moonshine::ui.products.products_title');
    }
    protected function activeActions(): ListOf
    {
        return parent::activeActions()->except(Action::VIEW);
    }
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            ProductIndexPage::class,
            ProductFormPage::class,
            ProductDetailPage::class,
        ];
    }
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine::ui.products.name'), 'name')->sortable(),
            BelongsTo::make(
                __('moonshine::ui.categories.categories_title'),
                'category',
                formatted: static fn (Category $model) => $model->name,
                resource: CategoryResource::class,
            )->badge(Color::PURPLE)->sortable(),
            Switcher::make(__('moonshine::ui.products.is_active'), 'is_active')->sortable(),
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
                    Text::make(__('moonshine::ui.products.name'), 'name')->required(),
                ]),
                Flex::make([
                    Switcher::make(__('moonshine::ui.products.is_active'), 'is_active'),
                ]),
                Flex::make([
                    BelongsTo::make(
                        __('moonshine::ui.categories.categories_title'),
                        'category',
                        formatted: static fn(Category $model) => $model->name,
                        resource: CategoryResource::class,
                    )
                        ->creatable()
                        ->valuesQuery(static fn(Builder $q) => $q->select(['id', 'name'])),
                ]),
            ]),
        ];
    }
    /**
     * @param Product $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
