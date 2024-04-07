<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Shop;

class ShopController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Shop';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Shop());

        $grid->column('id', __('Id'));
        $grid->column('shop_name', __('Shop name'));
        $grid->column('shop_code', __('Shop code'));
        $grid->column('shop_address', __('Shop address'));
        $grid->column('shop_phone', __('Shop phone'));
        $grid->column('shop_email', __('Shop email'))->hide();
        $grid->column('shop_website', __('Shop website'))->hide();
        $grid->column('shop_gps_coordinates', __('Shop gps coordinates'))->hide();
        $grid->column('shop_description', __('Shop description'))->hide();
        $grid->column('owners_name', __('Owners name'));
        $grid->column('owners_nic', __('Owners nic'));
        $grid->column('owners_phone', __('Owners phone'));
        $grid->column('owners_email', __('Owners email'));
        $grid->column('route_id', __('Route id'));
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
        $show = new Show(Shop::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('shop_name', __('Shop name'));
        $show->field('shop_code', __('Shop code'));
        $show->field('shop_address', __('Shop address'));
        $show->field('shop_phone', __('Shop phone'));
        $show->field('shop_email', __('Shop email'));
        $show->field('shop_website', __('Shop website'));
        $show->field('shop_gps_coordinates', __('Shop gps coordinates'));
        $show->field('shop_description', __('Shop description'));
        $show->field('owners_name', __('Owners name'));
        $show->field('owners_nic', __('Owners nic'));
        $show->field('owners_phone', __('Owners phone'));
        $show->field('owners_email', __('Owners email'));
        $show->field('route_id', __('Route id'));
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
        $form = new Form(new Shop());

        $form->tab('Shop information', function ($form) {
            $form->text('shop_name', __('Shop name'))->required();
            $form->text('shop_code', __('Shop code'));
            $form->text('shop_address', __('Shop address'))->required();
            $form->text('shop_phone', __('Shop phone'))->required();
            $form->text('shop_email', __('Shop email'));
            $form->text('shop_website', __('Shop website'));
            $form->text('shop_gps_coordinates', __('Shop gps coordinates'));
            $form->textarea('shop_description', __('Shop description'));
            $form->select('route_id', __('Route'))->options(\App\Models\Route::where('status','active')->pluck('name', 'id'))->required();
            $form->select('status', __('Status'))->options(['active'=>'active', 'inactive'=>'inactive'])->default('active')->required();

        });

        $form->tab('Owners information', function ($form) {
            $form->text('owners_name', __('Owners name'));
            $form->text('owners_nic', __('Owners nic'));
            $form->text('owners_phone', __('Owners phone'));
            $form->text('owners_email', __('Owners email'));
        });


        return $form;
    }
}
