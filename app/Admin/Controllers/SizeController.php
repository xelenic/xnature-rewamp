<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Size;

class SizeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Size';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Size());

        $grid->column('id', __('Id'));
        $grid->column('size_code', __('Size code'));
        $grid->column('size_name', __('Size name'));
        $grid->column('size_description', __('Size description'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Size::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('size_code', __('Size code'));
        $show->field('size_name', __('Size name'));
        $show->field('size_description', __('Size description'));
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
        $form = new Form(new Size());

        $form->text('size_code', __('Size code'))->required();
        $form->text('size_name', __('Size name'))->required();
        $form->textarea('size_description', __('Size description'));
        $form->select('status', __('Status'))->options(['active'=>'active', 'inactive'=>'inactive'])->default('active')->required();

        return $form;
    }
}
