// passando elementos HTML do carroussel para JS
const slider = document.querySelector('.slider');
const sliderContent = document.querySelector('.slider-conteudo');
const radioAuto = document.querySelector('.radio-auto');
const leftArrow = document.querySelector("#seta_esquerda");
const rigthArrow = document.querySelector("#seta_direita");

// declarando variaveis globais
let currentPage = 0;
let itemsPerView = 1;
let totalPages = 1;
let autoSlideInterval;

// criação/organização do carroussel
function updateCarroussel()
{
    const sliderWidth = slider.offsetWidth;
    const itemWidth = sliderContent.children[0].getBoundingClientRect().width;

    itemsPerView = (sliderWidth / itemWidth);
    totalPages = Math.ceil(sliderContent.children.length / itemsPerView);
    createRadioLabel();
    updateRadioLabel();
}

// RADIO LABEL
function createRadioLabel()
{
    for(let i = 0; i < totalPages; i++)
    {
        const label = document.createElement('div');
        label.classList.add('radio-label');
        if(i === 0)
        {
            label.classList.add('active');
        }
        label.addEventListener('click', () => {
            currentPage = i;
            scrollToPage();
        })
        radioAuto.appendChild(label);
    }
}
function updateRadioLabel()
{
    const labels = document.querySelectorAll('.radio-label');
    labels.forEach( (l,i) => {
        l.classList.toggle('active', i === currentPage)
    });
}

// MOVIMENTAÇÃO
function scrollToPage()
{
    const newPosition = slider.offsetWidth * currentPage;
    sliderContent.scrollTo({left:newPosition, behavior: 'smooth'});
    updateRadioLabel();
    resetAutoSlide();
}
function moveLeft()
{
    currentPage--;
    if(currentPage < 0)
    {
        currentPage = totalPages-1;
    }
    scrollToPage();
    resetAutoSlide();
}
function moveRigth()
{
    currentPage++;
    if(currentPage >= totalPages)
    {
        currentPage = 0;
    }
    scrollToPage();
    resetAutoSlide();
}

// SLIDE AUTOMATICO
function startAutoSlide()
{
    autoSlideInterval = setInterval( () => {
        moveRigth()
    }, 4000)
}
function resetAutoSlide()
{
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// EVENTOS
leftArrow.addEventListener('click', moveLeft);
rigthArrow.addEventListener('click', moveRigth);
window.addEventListener('resize', updateCarroussel);

// CHAMA INICIO DAS FUNÇÕES
updateCarroussel();
startAutoSlide();