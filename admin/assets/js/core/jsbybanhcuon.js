console.log(window.location.href)
var href = "?action=logout";
if((window.location.href).includes(href)){
    location.reload();
}