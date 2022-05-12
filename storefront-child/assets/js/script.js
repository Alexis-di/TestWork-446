function del_click() {
    document.getElementById("cf-image").value = '';
    document.getElementById("img-div").src = '';
}

function clear_all() {
    document.getElementById("cf-image").value = '';
    document.getElementById("img-div").src = '';
    document.getElementById("cf_published_date").value = '';
    document.getElementById("cf_type").value = '';
}

function update_click() {
    alert('The button is now working.');        
}