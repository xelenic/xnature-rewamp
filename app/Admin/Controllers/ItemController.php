<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Item;

class ItemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Main Stock';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Item());

        $grid->column('id', __('Id'));
        $grid->column('style.style_code', __('Style Code'));
        $grid->column('size.size_code', __('Size Code'));
        $grid->column('color.color_code', __('Color Code'));
        $grid->column('price', __('Price'));
        $grid->column('item_description', __('Item description'));
        $grid->column('status', __('Status'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Item::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('style.style_code', __('Style'));
        $show->field('color.color_code', __('Color'));
        $show->field('size.size_code', __('Size'));
        $show->field('quantity', __('Quantity'));
        $show->field('price', __('Price'));
        $show->field('item_description', __('Item description'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Item());

        $form->select('style_id', __('Style'))->options(\App\Models\Style::where('status','active')->pluck('style_code', 'id'))->required();
        $form->select('size_id', __('Size'))->options(\App\Models\Size::where('status','active')->pluck('size_code', 'id'))->required();
        $form->select('color_id', __('Color'))->options(\App\Models\Color::where('status','active')->pluck('color_code', 'id'))->required();
        $form->number('quantity', __('Quantity'))->default(0)->required();
        $form->decimal('price', __('Price(LKR)'))->default(0.00);
        $form->textarea('item_description', __('Item description'));
        $form->select('status', __('Status'))->options(['active'=>'active', 'inactive'=>'inactive'])->default('active')->required();

        return $form;
    }
}
