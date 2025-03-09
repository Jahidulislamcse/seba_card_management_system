// input file
function input_file(element1, element2){
    const elem1 = document.querySelector(element1);
    const emel2 = document.querySelector(element2);

    if(elem1){
        elem1.addEventListener("click", (()=>{
            emel2.click();
        }));
    }
}
// user management start
input_file('.admin-profile-photo', '.admin-profile-inp');
input_file('.admin-nid-card1', '.admin-nid1');
input_file('.admin-nid-card2', '.admin-nid2');
input_file('.admin-cv-upload', '.admin-cv');
input_file('.admin-certificate-upload', '.admin-certificate');

input_file('.up-profile-photo', '.up-profile-inp');
input_file('.up-nid-card1', '.up-nid1');
input_file('.up-nid-card2', '.up-nid2');
input_file('.up-cv-upload', '.up-cv');
input_file('.up-certificate-upload', '.up-certificate');

input_file('.un-profile-photo', '.un-profile-inp');
input_file('.un-nid-card1', '.un-nid1');
input_file('.un-nid-card2', '.un-nid2');
input_file('.un-cv-upload', '.un-cv');
input_file('.un-certificate-upload', '.un-certificate');

input_file('.wor-profile-photo', '.wor-profile-inp');
input_file('.wor-nid-card1', '.wor-nid1');
input_file('.wor-nid-card2', '.wor-nid2');
input_file('.wor-cv-upload', '.wor-cv');
input_file('.wor-certificate-upload', '.wor-certificate');
// user management end
input_file('.offer-img-btn', '.offer-img');



// tab system start
const tab_btns = document.querySelector('.tab-btns');
const btns = document.querySelector('.btns');
if(tab_btns){
    tab_btns.addEventListener("click", ((event) =>{
        btns.classList.toggle('active-tab-btn');
    }))
}

function tabBtn(element1, element2, operation1){
    const elem1 = document.querySelectorAll(element1);
    const elem2 = document.querySelectorAll(element2)

    if(elem1){
        const tab_btn = document.querySelector('.tab-btns');
        const btn = document.querySelector('.btns');

        elem1.forEach((btns, index) =>{
            btns.addEventListener("click", (() =>{
                // class remove
                elem2.forEach((content) =>{
                    content.classList.remove(operation1);
                });
                elem1.forEach((btn) =>{
                    btn.classList.remove('active-btn');
                });
                // class remove

                // class add
                elem2[index].classList.add(operation1);
                elem1[index].classList.add('active-btn');
                // class add

                btn.classList.remove('active-tab-btn');
                tab_btn.innerHTML = btns.innerText + `<img src="assets/img/arrow down.png" alt="arrow icon">`;
            }));
        });
    };
}
tabBtn('.buttons', '.contents', 'active_section');
tabBtn('.sub_btn1', '.sub_content1', 'active_content1');
tabBtn('.sub_btn2', '.sub_content2', 'active_content2');
tabBtn('.sub_btn3', '.sub_content3', 'active_content3');

tabBtn('.user-list-btn', '.user-content', 'active_user_section');
tabBtn('.cost-btn', '.cost-content', 'active_cost');
tabBtn('.income-btn', '.income-content', 'active_income');

// tab system end
