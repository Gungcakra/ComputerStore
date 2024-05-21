// get limit value
var limit = document.getElementById('limitselect').value;

document.getElementById('limitselect').addEventListener('change', function(){
    document.getElementById('filterform').submit();
});

window.onload = function(){
    document.getElementById('limitselect').value = limit;
}
// document.getElementById('limitselect').addEventListener('change', function() {
//     document.getElementById('filterform').submit();
//    });
