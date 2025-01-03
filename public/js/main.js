
  // Selecciona el carrusel
  const carousel = document.querySelector('#carouselExampleDark');
  let startX, endX;

  // Detecta el inicio del arrastre/deslizamiento
  carousel.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
  });

  carousel.addEventListener('mousedown', (e) => {
    startX = e.clientX;
  });

  // Detecta el fin del arrastre/deslizamiento
  carousel.addEventListener('touchend', (e) => {
    endX = e.changedTouches[0].clientX;
    handleSwipe();
  });

  carousel.addEventListener('mouseup', (e) => {
    endX = e.clientX;
    handleSwipe();
});

  // Función para determinar la dirección del deslizamiento
  function handleSwipe() {
    const swipeThreshold = 50; // Mínima distancia en píxeles para considerar un swipe

    if (startX - endX > swipeThreshold) {
      // Desliza hacia la izquierda (próximo slide)
      carousel.querySelector('.carousel-control-next').click();
    } else if (endX - startX > swipeThreshold) {
      // Desliza hacia la derecha (slide anterior)
      carousel.querySelector('.carousel-control-prev').click();
    }
  };

//usuario

const tabEventos = document.getElementById('tabEventos');
const tabCrearEventos = document.getElementById('tabCrearEventos');
const eventosSection = document.getElementById('eventos');
const crearEventosSection = document.getElementById('crearEventos');

// Cambiar a la vista "Eventos"
tabEventos.addEventListener('click', () => {
    eventosSection.style.display = 'flex';
    crearEventosSection.style.display = 'none';
    tabEventos.classList.add('active');
    tabCrearEventos.classList.remove('active');
});

// Cambiar a la vista "Crear Eventos"
tabCrearEventos.addEventListener('click', () => {
    eventosSection.style.display = 'none';
    crearEventosSection.style.display = 'flex';
    tabCrearEventos.classList.add('active');
    tabEventos.classList.remove('active');
});




  
