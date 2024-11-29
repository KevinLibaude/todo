const selectuser = document.getElementById("user");
selectuser.addEventListener('change', () => {
    let user = selectuser.value;
    
    if(user === "Selectionner un utilisateur"){
        return;
    }
    
    let users = document.getElementById("users");
    users.value = users.value.trim().replace(/^,+|,+$/g, '');
    
    if(!users.value || users.value === ""){
        users.value = user;
    }
    else if(!users.value.split(',').includes(user)){
        users.value += ',' + user;
    }
})