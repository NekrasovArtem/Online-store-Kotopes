const iziModalRules = {
    width: 600,
    zindex: 10,
    radius: '1rem',
    padding: 10,
    background: "FFF",
    closeOnEscape: true,
    focusInput: true,
};
const iziModalProductsRules = {
    width: 1000,
    zindex: 10,
    radius: '1rem',
    padding: 10,
    background: "FFF",
    closeOnEscape: true,
    focusInput: true,
}

$("#addCategoryModal").iziModal(iziModalRules);

$("#addSubcategoryModal").iziModal(iziModalRules);

$("#clientInfo").iziModal(iziModalRules);

$("#addProductModal").iziModal(iziModalProductsRules);