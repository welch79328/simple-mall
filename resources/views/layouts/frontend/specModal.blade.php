<style>
    .disable {
        cursor: not-allowed;
        color: #e71d1c;
    }
</style>
<!-- modal -->
<div class="modal" tabindex="-1" role="dialog" id="specModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">選取規格放入購物車</h4>
            </div>
            <div class="modal-body">
                @foreach($specArray as $spec)
                    @if($spec->stock == 0)
                        <label class="radio-inline disable">
                            <input type="radio" name="spec" value="{{$spec->id}}"
                                   disabled>{{$spec->spec}}(庫存不足)
                        </label>
                    @elseif($spec->stock > 0)
                        <label class="radio-inline">
                            <input type="radio" name="spec" value="{{$spec->id}}">{{$spec->spec}}
                        </label>
                    @endif
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                <button type="button" class="btn btn-info" onclick="addToCart(this.value)" value="{{$commodity_id}}">
                    放入購物車
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- //modal -->
<script>

    function addToCart(commodity_id) {
        var checked = $('input[name=spec]:checked');
        if (checked.length == 0) {
            showModal("remainModal", "提示", "請先選擇規格！");
            return;
        }
        var spec_id = checked.val();
        addToShoppingCart(commodity_id, spec_id);
        $("#specModal").modal("hide");
    }

</script>