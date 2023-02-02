<div>
    <main id="main" class="main-site">

        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">home</a></li>
                    <li class="item-link"><span>detail</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="wrap-review-form">
                        @if (Session::has('add-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('add-success') }}
                            </div>
                        @endif
                        <div id="comments">
                            <ol class="commentlist">
                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                    id="li-comment-20">
                                    <div id="comment-20" class="comment_container">
                                        <img alt=""
                                            src="{{ asset('assets/images/products') }}/{{ $orderItem->product->image }}"
                                            height="80" width="80">
                                        <div class="comment-text">

                                            <p class="meta">
                                                <strong
                                                    class="woocommerce-review__author">{{ $orderItem->product->name }}</strong>

                                            </p>

                                        </div>
                                </li>
                            </ol>
                        </div><!-- #comments -->

                        <div id="review_form_wrapper">
                            <div id="review_form">
                                <div id="respond" class="comment-respond">

                                    <form action="#" wire:submit.prevent='addReview' id="commentform"
                                        class="comment-form" novalidate="">

                                        <div class="comment-form-rating">
                                            <span>Your rating</span>
                                            <p class="stars">

                                                <label for="rated-1"></label>
                                                <input type="radio" id="rated-1" name="rating" wire:model='rating'
                                                    value="1">
                                                <label for="rated-2"></label>
                                                <input type="radio" id="rated-2" name="rating" wire:model='rating'
                                                    value="2">
                                                <label for="rated-3"></label>
                                                <input type="radio" id="rated-3" name="rating" wire:model='rating'
                                                    value="3">
                                                <label for="rated-4"></label>
                                                <input type="radio" id="rated-4" name="rating" wire:model='rating'
                                                    value="4">
                                                <label for="rated-5"></label>
                                                <input type="radio" id="rated-5" name="rating" wire:model='rating'
                                                    value="5" checked="checked">
                                            </p>
                                        </div>

                                        <p class="comment-form-comment">
                                            <label for="comment">Your review <span class="required">*</span>
                                            </label>
                                            <textarea wire:model='comment' id="comment" name="comment" cols="45" rows="8"></textarea>
                                        </p>
                                        <p class="form-submit">

                                            <input name="submit" type="submit" id="submit" class="submit"
                                                value="Submit">
                                        </p>
                                    </form>

                                </div><!-- .comment-respond-->
                            </div><!-- #review_form -->
                        </div><!-- #review_form_wrapper -->

                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</main>

</div>
