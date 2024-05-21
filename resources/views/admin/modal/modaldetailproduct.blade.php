<div class="modal fade" id="detail{{ $dt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Name : <b>{{ $dt->name }}</b></p>
            <p>Category : <b>{{ $dt->category->name }}</b></p>
            <p>Description : <b>{{ $dt->description }}</b></p>
            <p>Price : Rp <b>{{ $dt->price }}</b></p>
            <p>Stock : <b>{{ $dt->stock }}</b></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>