console.log(window.location.href)
var href1 = "?action=logout";
var href2 = "products.php?customer_id"
if((window.location.href).includes(href1) || (window.location.href).includes(href2)){
    location.reload();
}