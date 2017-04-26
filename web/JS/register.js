var workBlock = document.getElementsByClassName('work_info');
var businessLabel = document.querySelector('[for=fos_user_registration_form_business]');
var professionLabel = document.querySelector('[for=fos_user_registration_form_profession]');

var wilderOpt = document.getElementById('fos_user_registration_form_statut_0');
var oldWilderOpt = document.getElementById('fos_user_registration_form_statut_1');
var staffOpt = document.getElementById('fos_user_registration_form_statut_2');

for (j=0; j<workBlock.length; j++) {
    workBlock[j].style.display = 'none';
}
businessLabel.style.display = 'none';
professionLabel.style.display = 'none';

wilderOpt.addEventListener('click', function () {
     for (j=0; j<workBlock.length; j++) {
         workBlock[j].style.display = 'none';
         businessLabel.style.display = 'none';
         professionLabel.style.display = 'none';
     }
});

oldWilderOpt.addEventListener('click', function () {
    for (j=0; j<workBlock.length; j++) {
        workBlock[j].style.display = 'inline-block';
        businessLabel.style.display = 'inline';
        professionLabel.style.display = 'inline';
    }
});

staffOpt.addEventListener('click', function () {
    for (j=0; j<workBlock.length; j++) {
        workBlock[j].style.display = 'inline-block';
        businessLabel.style.display = 'inline';
        professionLabel.style.display = 'inline';
    }
});