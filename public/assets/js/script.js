// header right amount section
const amount_btn = document.querySelector('.amount-btn');
const amounts = document.querySelector('.amounts');
if(amount_btn){
    amount_btn.addEventListener("click", (()=>{
        amounts.classList.toggle('show')
    }))
}



// edit user information start (profile.html)
const editIcons = document.querySelectorAll(".input-box-icon");
if(editIcons){
    const saveButton = document.querySelector(".user-save-btn");
    saveButton.classList.add('disable-btn');
    editIcons.forEach((icon) => {
        icon.addEventListener("click", function () {
            const inputField = this.previousElementSibling;
            if (inputField) {
                inputField.removeAttribute("disabled"); 
                inputField.focus(); 
                saveButton.removeAttribute("disabled"); 
                saveButton.classList.remove('disable-btn');
            }
        });
    });
}
// edit user information end (profile.html)


// input file
function input_file(element1, element2){
    const profile_photo = document.querySelector(element1);
    const profile_inp = document.querySelector(element2);

    if(profile_photo){
        profile_photo.addEventListener("click", (()=>{
            profile_inp.click();
        }));
    }
}
input_file('.profile-photo', '.profile-inp');