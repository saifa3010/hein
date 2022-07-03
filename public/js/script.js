let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 150){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }

}

document.addEventListener("DOMContentLoaded", function(event) { 
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};


let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}


/**
 * @description Change Home page slider's arrows active status
 */
 function updateSliderArrowsStatus(
  cardsContainer,
  containerWidth,
  cardCount,
  cardWidth
) {
  if (
    $(cardsContainer).scrollLeft() + containerWidth <
    cardCount * cardWidth + 15
  ) {
    $("#slide-right-container").addClass("active");
  } else {
    $("#slide-right-container").removeClass("active");
  }
  if ($(cardsContainer).scrollLeft() > 0) {
    $("#slide-left-container").addClass("active");
  } else {
    $("#slide-left-container").removeClass("active");
  }
}
$(function() {
  // Scroll products' slider left/right
  let div = $("#cards-container");
  let cardCount = $(div)
    .find(".cards")
    .children(".card").length;
  let speed = 1000;
  let containerWidth = $(".container").width();
  let cardWidth = 250;

  updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);

  //Remove scrollbars
  $("#slide-right-container").click(function(e) {
    if ($(div).scrollLeft() + containerWidth < cardCount * cardWidth) {
      $(div).animate(
        {
          scrollLeft: $(div).scrollLeft() + cardWidth
        },
        {
          duration: speed,
          complete: function() {
            setTimeout(
              updateSliderArrowsStatus(
                div,
                containerWidth,
                cardCount,
                cardWidth
              ),
              1005
            );
          }
        }
      );
    }
    updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
  });
  $("#slide-left-container").click(function(e) {
    if ($(div).scrollLeft() + containerWidth > containerWidth) {
      $(div).animate(
        {
          scrollLeft: "-=" + cardWidth
        },
        {
          duration: speed,
          complete: function() {
            setTimeout(
              updateSliderArrowsStatus(
                div,
                containerWidth,
                cardCount,
                cardWidth
              ),
              1005
            );
          }
        }
      );
    }
    updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
  });

  // If resize action ocurred then update the container width value
  $(window).resize(function() {
    try {
      containerWidth = $("#cards-container").width();
      updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
    } catch (error) {
      console.log(
        `Error occured while trying to get updated slider container width: 
            ${error}`
      );
    }
  });
});
