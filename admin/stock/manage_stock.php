<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `stock_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #cimg{
        object-fit:scale-down;
        object-position:center center;
        height:200px;
        width:200px;
    }
</style>
<div class="container-fluid">
    <form action="" id="service-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="name" class="control-label">Stock Name</label>
            <input type="text" name="name" id="name" class="form-control form-control-border" placeholder="Enter Stock Name" value ="<?php echo isset($name) ? $name : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control form-control-border" placeholder="Enter Stock Amount" value ="<?php echo isset($amount) ? $amount : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Each price</label>
            <input type="number" step="any" name="each_price" id="each_price" class="form-control form-control-border text-right" placeholder="Each Price" value ="<?php echo isset($each_price) ? $each_price : 0 ?>" required>
        </div>
        <div class="form-group">
            <label for="fee" class="control-label">Total</label>
            <input type="number" step="any" name="total" id="total" class="form-control form-control-border text-right" placeholder="Total" value ="<?php echo isset($total) ? $total : 0 ?>" required>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#uni_modal').on('shown.bs.modal',function(){
            $('#category_ids').select2({
                placeholder:"Please Enter details.",
                width:'100%',
                dropdownParent:$('#uni_modal')
            })
            $('.summernote').each(function(){
                var _this = $(this);
                _this.summernote({
                    height:'15vh',
                    placeholder:_this.attr('data-placeholder'),
                })
            })
        })
        $('#uni_modal #service-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_service",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>