<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Color;

class ColorsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Color';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Color());

        $grid->column('id', __('Id'));
        $grid->column('color_code', __('Color code'));
        $grid->column('color_name', __('Color name'));
        $grid->column('color_description', __('Color description'));
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
        $show = new Show(Color::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('color_code', __('Color code'));
        $show->field('color_name', __('Color name'));
        $show->field('color_description', __('Color description'));
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
        $form = new Form(new Color());

        $form->text('color_code', __('Color code'))->required();
        $form->text('color_name', __('Color name'))->required();
        $form->textarea('color_description', __('Color description'));
        $form->select('status', __('Status'))->options(['active'=>'active', 'inactive'=>'inactive'])->default('active')->required();

        return $form;
    }
}
