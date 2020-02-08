
let carSearch = document.querySelector('#carSearch');
let filterForm = document.querySelector('.home-filter-div');

filterForm.addEventListener('click', e => {
       
    if (e.target.classList.contains('carSearchBtn')){
        let carSearchBtn = document.querySelectorAll('.carSearchBtn'); 
        for (i = 0; i < carSearchBtn.length; i++){
           carSearchBtn[i].classList.remove('btn-active');
           e.target.classList.add('btn-active');   
        }
        carSearch.value = e.target.innerText.toLowerCase();
    }
});




