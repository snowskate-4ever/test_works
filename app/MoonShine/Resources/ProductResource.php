<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\MoonShine\Pages\Product\ProductIndexPage;
use App\MoonShine\Pages\Product\ProductFormPage;
use App\MoonShine\Pages\Product\ProductDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Product, ProductIndexPage, ProductFormPage, ProductDetailPage>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';
    
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
