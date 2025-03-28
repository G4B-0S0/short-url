let currentStep = 1;

const nextButton = document.getElementById('next');
const previousButton = document.getElementById('prev');

nextButton.addEventListener('click', () => {
    if (currentStep === 3) {
        alert('You have reached the end of the form');
        return;
    }
    currentStep++;
    updateStep();
});

previousButton.addEventListener('click', () => {
    if (currentStep === 1) return;
    currentStep--;
    updateStep();
});

const updateStep = () => {
    document.querySelector('.active').classList.remove('active');
    document.getElementById(`step-${currentStep}`).classList.add('active');
};





///////////////////////////////////////////////////////////////////////////






// let currentStep = 1;

// const nextButton = document.getElementById('next');
// const previousButton = document.getElementById('prev');

// nextButton.addEventListener('click', () => {
//     if (currentStep === 3) {
//         alert('You have reached the end of the form');
//         return;
//     }
//     currentStep++;
//     updateStep();
// });

// previousButton.addEventListener('click', () => {
//     if (currentStep === 1) return;
//     currentStep--;
//     updateStep();
// });

// const updateStep = () => {
//     document.querySelector('.active').classList.remove('active');
//     document.querySelector(`step-${currentStep}`).classList.add('active');
// }