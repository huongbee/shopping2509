<?php foreach($data as $p):?>
<li class="product-<?=$p->id_type?>  item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
    <div class="product-item">
        <div class="item-inner">
        <div class="product-thumbnail">
            <div class="pr-img-area">
            <a title="<?=$p->name?>" href="<?=$p->url?>-<?=$p->id?>.html">
                <figure>
                    <img class="first-img" src="public/images/products-images/<?=$p->image?>" alt="<?=$p->name?>">
                    <img class="hover-img" src="public/images/products-images/<?=$p->image?>" alt="<?=$p->name?>">
                </figure>
            </a>
            <button type="button" class="add-to-cart-mt">
                <i class="fa fa-shopping-cart"></i>
                <span> Add to Cart</span>
            </button>
            </div>
        </div>
        <div class="item-info">
            <div class="info-inner">
            <div class="item-title">
                <a title="<?=$p->name?>" href="<?=$p->url?>-<?=$p->id?>.html"><?=$p->name?></a>
            </div>
            <div class="item-content">
                <div class="item-price">
                     <div class="price-box">
                        <?php if($p->promotion_price!=0):?>
                            <p class="special-price">
                                <span class="price"> <?=number_format($p->promotion_price)?> </span>
                            </p>
                            <p class="old-price">
                                <span class="price"> <?=number_format($p->price)?> </span>
                            </p>
                        <?php else:?>
                            <p class="special-price">
                                <span class="price"> <?=number_format($p->price)?> </span>
                            </p>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</li>
<?php endforeach?>