<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Style;

class StyleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Style';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Style());

        $grid->column('id', __('Id'));
        $grid->column('style_code', __('Style code'));
        $grid->column('style_name', __('Style name'));
        $grid->column('style_description', __('Style description'));
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
        $show = new Show(Style::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('style_code', __('Style code'));
        $show->field('style_name', __('Style name'));
        $show->field('style_description', __('Style description'));
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
        $form = new Form(new Style());

        $form->text('style_code', __('Style code'))->required();
        $form->text('style_name', __('Style name'))->required();
        $form->textarea('style_description', __('Style description'));
        $form->select('status', __('Status'))->options(['active'=>'active', 'inactive'=>'inactive'])->default('active')->required();

        return $form;
    }
}
