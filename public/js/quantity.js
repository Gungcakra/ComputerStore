const minus = document.querySelector("#btn-minus");
const plus = document.querySelector("#btn-plus");
const quantity = document.querySelector("#quantity");

let nilai = 1;

minus.addEventListener("click", () => {
    if (quantity.value > 1) {
        nilai--;
    }
    quantity.value = nilai;
});
plus.addEventListener("click", () => {
    nilai++;
    quantity.value = nilai;
});