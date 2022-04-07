<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;


class PostTable extends DataTableComponent
{
    protected $model = Post::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
//            ->setDebugEnabled()
            ->setHideBulkActionsWhenEmptyEnabled();

    }


    public function columns(): array
    {

        return [

            Column::make('category', 'category.name')
                ->sortable()
                ->searchable(),
            Column::make('age', 'age.name')
            ->sortable()
            ->searchable(),

            Column::make("Image", "image")
                ->format(function ($value) {
                    return view('livewire.post-table.image', ['value' => $value]);
                })
                ->sortable(),

            Column::make(__('edit-post'), 'id')
                ->format(function ($value) {
                    return view('livewire.post-table.edit-button', ['post' => $value]);
                }),
        ];
    }


    public function rowView(): string
    {
        return 'location.to.my.row.view';
    }
}
