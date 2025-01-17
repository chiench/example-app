<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;
    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }
    public function addReview()
    {

        $review = new Review();
        $review->order_item_id = $this->order_item_id;
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();
        session()->flash('add-success', 'Add review successfully');
    }
    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view(
            'livewire.user.user-review-component',
            compact('orderItem')

        )->layout('layouts.base');
    }
}
