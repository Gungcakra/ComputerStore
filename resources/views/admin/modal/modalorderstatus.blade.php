<div class="modal fade" id="edit{{ $or->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Set Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/editorder/{{ $or->id }}" method="GET">
           
            <input type="hidden" name="user_id" value="{{ $or->user_id }}">
            <input type="hidden" name="product_id" value="{{ $or->product_id }}">
            <input type="hidden" name="quantity" value="{{ $or->quantity }}">
            <input type="hidden" name="total_price" value="{{ $or->total_price }}">
          <div class="form-group">
            <label for="exampleInputEmail1">Set Status</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="delivery_status">
                  <option>Choose Status...</option>
                  <option selected>{{ $or->delivery_status == 'P' ? 'Pending' : '' }}{{ $or->delivery_status == 'C' ? 'Canceled' : ''}} {{ $or->delivery_status == 'S' ? 'Success' : ''}}</option>
                  <option value="P">Pending</option>
                  <option value="C">Cancel</option>
                  <option value="S">Aprove</option>
                
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
        </div>
      </div>
    </div>
  </div>