 <!--   sidebar  -->         
   <div class="col-lg-3 col-xs-12 col-md-3 col-sm-3 sidebar gray">
    <h4 class="heading">RECENT Added Business</h4>
    <div class="row">
     <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" style="padding-bottom:30px;">
      <div id="example">
         <ul>
 <?php
              $types=DB::table('business')
                      ->join('childcategory','childcategory.id','=','business.child_id')
                      ->join('subcategory','subcategory.id','=','childcategory.sub_id')
                      ->join('category','category.id','=','subcategory.cate_id')
                      ->select('business.*')
                      ->where('category.status','=',1)
                      ->where('childcategory.status','=',1)
                      ->where('business.status','=',1)
                      ->orderBy('business.id','desc')
                      ->where('subcategory.status','=',1)->paginate(20);
                     
foreach ($types as $key) {
  
 ?>     

<li>
   <a href="@if($key->show == 1)/page/{{$key->id}} @endif"><?= $key->shop_name ?>
   <br> <span class="dated"><?= $key->location ?></span></a>

</li>



<?php } ?>
         </ul>
</div>
</div>
<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
<h4 class="heading">testimonial</h4>
<?php $cate=Textimonial::where('status','=',1)->orderBy('id','desc')->paginate(5);   ?>
          @foreach($cate as $c)
            <div class="testimonial">
            {{$c->message}}
</div>
<a href="" class="mr">By {{$c->name}}</a>
           @endforeach

</div>

 <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
<h4 class="heading">USEFUL INFORMATION</h4>


<div class=" pharagraph">SMJ Solutions is best in online Shopping. You can Search any product of your choice with maximum Discount.
                             
   </div> </div>
 </div>
   </div>
 <!--   sidebar  --> 


    <script src="/news/jquery.vticker.js"></script>
<script>
$(function() {
 
  $('#example').vTicker();
});
</script> 