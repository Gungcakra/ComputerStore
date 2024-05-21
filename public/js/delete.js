$('.delete').click(function(){
    var productId = $(this).attr('data-id');
    Swal.fire({
title: "Are you sure?",
text: "You Will Delete This Data",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Delete"
}).then((result) => {
if (result.isConfirmed) {
window.location = "/deleteproduct/" +productId+"";

} 
});
});