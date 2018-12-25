 <!-- Main Container -->
 <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá / Giá khuyến mãi</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  <?php foreach ($data['cart']->items as $key => $value):?>
                    <tr>
                        <td class="cart_product">
                          <a href="#">
                            <img src="public/images/products-images/<?=$value['item']->image?>" alt="<?=$value['item']->name?>">
                          </a>
                        </td>
                        <td class="cart_description">
                          <p class="product-name">
                            <a href="#"><?=$value['item']->name?></a>
                          </p>
                        </td>
                        <td class="price">
                          <?php if($value['item']->price != $value['item']->promotion_price ):?>
                            <span  style="color:#000">
                              <del>
                                <?=number_format($value['item']->price)?>
                              </del>
                            </span>
                            <br>
                            <span>
                                <?=number_format($value['item']->promotion_price)?>
                            </span>
                            <?php else:?>
                            <span>
                                <?=number_format($value['item']->promotion_price)?>
                            </span>
                            <?php endif?>
                        </td>
                        <td class="qty">
                          <input class="form-control input-sm" type="text" value="<?=$value['qty']?>">
                        </td>
                        <td class="price">
                        <?php if($value['item']->price != $value['item']->promotion_price ):?>
                          <span  style="color:#000">
                            <del>
                              <?=number_format($value['price'])?>
                            </del>
                          </span>
                          <br>
                          <span>
                          <?=number_format($value['discountPrice'])?>
                          </span>
                          <?php else:?>
                          <span>
                          <?=number_format($value['price'])?>
                          </span>
                          <?php endif?>
                        </td>
                        <td class="action">
                          <a href="#" class="delete-cart" data-id="<?=$value['item']->id?>"><i class="icon-close"></i></a>
                        </td>
                    </tr>
                  <?php endforeach?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Tổng tiền</td>
                      <td colspan="2"><?=number_format($data['cart']->totalPrice)?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Thanh toán</strong></td>
                      <td colspan="2"><strong><?=number_format($data['cart']->promtPrice)?></strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
  $(document).ready(function(){
    $('.delete-cart').click(function(){
      var id = $(this).attr('data-id')
      $.ajax({
        url:'shopping-cart.php',
        type:'POST',
        data:{
          idSP : id,
          action:'delete'
        },
        success:function(res){
          console.log(res)
        },
        error:function(err){
          console.log(err)
        }
      })
    })
  })
  
  </script>