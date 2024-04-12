<?php

namespace App\Admin\Controllers;

use App\Models\Color;
use App\Models\Item;
use App\Models\Packet;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use Ramsey\Uuid\Uuid;

class PacketController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Packet';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Packet());

        $grid->column('id', __('Id'));
        $grid->column('qr', __('Qr'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Packet::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('qr', __('Qr'));
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
        $form = new Form(new Packet());

        $form->select('style', __('Style'))->options(\App\Models\Style::where('status','active')->pluck('style_code', 'id'));
        $form->number('qty', __('Packet QTY'));

        $form->table('packet_items', function ($table) {
            $table->select('color', __('Color'))->options(\App\Models\Color::where('status','active')->pluck('color_code', 'id'));
            $table->select('size', __('size'))->options(\App\Models\Size::where('status','active')->pluck('size_code', 'id'));
            $table->number('quantity', __('Quantity'));
        });

        $form->submitted(function (Form $form) {
        });

        $form->saving(function (Form $form) {

            // considering the packets quantity receive in the request need to be created

            $packet = new Packet();
            $packet->qr = Uuid::uuid4()->toString();
            $packet->status = 'active';
            $packet->save();

            if($form->input('packet_items')){
                foreach($form->input('packet_items') as $key => $item){
                    $mainStock = Item::where('color_id', $item['color'])
                        ->where('size_id', $item['size'])
                        ->where('style_id', $form->input('style'))
                        ->first();
                    if($mainStock == null)
                    {
                        $mainStockNewItem = new Item();
                        $mainStockNewItem->color_id = $item['color'];
                        $mainStockNewItem->size_id = $item['size'];
                        $mainStockNewItem->style_id = $form->input('style');
                        $mainStockNewItem->quantity = 0;
                        $mainStockNewItem->price = 0;
                        $mainStockNewItem->status = 'active';
                        $mainStockNewItem->save();
                    }else{
                        $mainStockNewItem = $mainStock;
                    }

                    $packetItem = new \App\Models\PacketItems();
                    $packetItem->packet_id = $packet->id;
                    $packetItem->item_id = $mainStockNewItem->id;
                    $packetItem->quantity = $item['quantity'];
                    $packetItem->status = 'active';
                    $packetItem->save();
                }
            }

        });

        $form->saved(function (Form $form) {

        });


        return $form;
    }
}
