(()=>{"use strict";
let telegram = document.querySelector('.wptelegram-login-output-wrap')
if (telegram && telegram.classList.contains('container')) {
  telegram.classList.remove('container')
}
if (document.querySelectorAll('.slider')) {
  
const sliderItem = document.querySelector('.slider')
const sliderSquer = document.querySelector('.slider__square')
const sliderImageHorizont = document.querySelector('.slider__image-horizont')
const youtubes = document.querySelectorAll('.swiper-slide.youtube')
const ImageYoutubes = document.querySelectorAll('.swiper-slide .youtube')
const modalItem = document.querySelectorAll('.body .modal')
const sliderImagesModals = document.querySelectorAll('.body .slider__images--modal') 

const mediaQuery = window.matchMedia('(min-width: 769px)')

let clicked = false
let msnrySlider
let isMobileWidth = window.innerWidth < 769
let sliderThumbs
let carousel
let srcModal = "?rel=0&autoplay=1"
let srcUrl
let videoIframe
let videoURL
let iframeUrl
let iframeThumb
let urlThumb

function sliderThumbActive(images, thumbs) {
  if (images && thumbs) {
    
  sliderThumbs = new Swiper(thumbs, {
      direction: getDirection(),
      slidesPerView: 'auto',
      speed: 600,
      grabCursor: true,
      mousewheel: true,
      spaceBetween: 10,
      on: {
        click: function () {
          clicked = true
          if (mediaQuery.matches) {
            sliderThumbs.changeDirection(getDirection())
            sliderItem.classList.add('slider-vertical')
            sliderThumbs.wrapperEl.classList.add('slider-grid')
            youtubes.forEach(el => {
              el.classList.add('ratio-16x9')
            })

            let swSlImg = sliderImages.wrapperEl.querySelectorAll('img')
            for (let i=0; i < swSlImg.length; i++) {
              if (sliderImages.slides[i].classList.contains('swiper-slide-prev')) {
                var width = swSlImg[i].offsetWidth;
                var height = swSlImg[i].offsetHeight;
                if (width > height ) {
                  clicked = false
                  sliderThumbs.changeDirection(getDirection())
                  sliderItem.classList.remove('slider-vertical')
                  sliderThumbs.wrapperEl.classList.remove('slider-grid')
                  youtubes.forEach(el => el.classList.remove('ratio-16x9'))
                }
              }
            }

            if (this.clickedSlide.classList.contains('ratio-16x9')) {
              clicked = false
              sliderThumbs.changeDirection(getDirection())
              sliderItem.classList.remove('slider-vertical')
              sliderThumbs.wrapperEl.classList.remove('slider-grid')
              youtubes.forEach(el => el.classList.remove('ratio-16x9'))
            }
            if (document.querySelector('.slider-grid')) {
              this.mousewheel.disable()
              masonrySlider()
            } else {
              this.mousewheel.enable()
              masonrySliderDelete()
            }
          }
        }
      },
      breakpoints: {
        0: {
          direction: 'horizontal',
          spaceBetween: 4,
          allowSlideNext: true,
          allowSlidePrev: true,
          slideToClickedSlide: true,
        },
        768: {
          // allowSlideNext: false,
          // allowSlidePrev: false,
        }
      }
    })

    const sliderImages = new Swiper(images, {
      direction: 'horizontal',
      slidesPerView: 1,
      spaceBetween: 24,
      speed: 600,
      autoHeight: false,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
        slideChange: function () {
          hideIframe()
          if (mediaQuery.matches) {
              clicked = true
              sliderItem.classList.add('slider-vertical')
              sliderThumbs.changeDirection(getDirection())

              sliderThumbs.wrapperEl.classList.add('slider-grid')
              
              let swSlImg = sliderImages.wrapperEl.querySelectorAll('img')
              for (let i=0; i < swSlImg.length; i++) {
                if (sliderImages.slides[i].classList.contains('swiper-slide-active')) {
                  var width = swSlImg[i].offsetWidth;
                  var height = swSlImg[i].offsetHeight;
                  if (width > height ) {
                    clicked = false
                    sliderThumbs.changeDirection(getDirection())
                    sliderItem.classList.remove('slider-vertical')
                    sliderThumbs.wrapperEl.classList.remove('slider-grid')
                    youtubes.forEach(el => el.classList.remove('ratio-16x9'))
                  }
                }
              }
              let swiperSliders = sliderImages.wrapperEl.querySelectorAll('.swiper-slide')
              let fullSliders = sliderImages.wrapperEl.querySelectorAll('.fullscrin')
              let i
              for(i=0; i < fullSliders.length; i++) {
                if (i != 0) {
                  fullSliders[i].setAttribute('data-slider', i)
                } else {
                  fullSliders[i].setAttribute('data-slider', '0')
                }
                
              }
              for(i=0; i < swiperSliders.length; i++) {
                if (i != 0) {
                  swiperSliders[i].setAttribute('data-slider', i)
                } else {
                  swiperSliders[i].setAttribute('data-slider', '0')
                }
              }
              
              if (sliderImages.activeIndex === 0) {
                clicked = false
                sliderThumbs.changeDirection(getDirection())
                sliderItem.classList.remove('slider-vertical')
                sliderThumbs.wrapperEl.classList.remove('slider-grid')
                youtubes.forEach(el => el.classList.remove('ratio-16x9'))
              }
              if (document.querySelector('.slider-grid')) {
                masonrySlider()
              } else {
                masonrySliderDelete()
              }
          } else {
            sliderThumbs.wrapperEl.classList.remove('slider-grid')
          }
        }
      },
      thumbs: {
        swiper: sliderThumbs
      },
      breakpoints: {
        0: {
          direction: 'horizontal',
          autoHeight: true,
          // mousewheel: true,
          keyboard: true,
          allowSlidePrev: true,
          allowSlideNext: true
        }
      },
    })

  }
}

function getDirection() {
  let direction = clicked ? 'vertical' : 'horizontal'
  return direction
}

function masonrySlider() {
  msnrySlider = new Masonry( document.querySelector('.slider-grid'), {
    gutter: 10,
    columnWidth: 110,
    percentPosition: true,
  })
}

function masonrySliderDelete() {
  if (msnrySlider) msnrySlider.destroy();
  // msnrySlider.destroyed();
}

function sliderImageActive(images) {
const sliderImagesSquer = new Swiper(images, {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 24,
  speed: 600,
  mousewheel: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  grabCursor: true,
})
}
if (document.querySelectorAll('.slider__images--main') && document.querySelectorAll('.slider-thumb__images--main')) {
  if (isMobileWidth) {
    sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
    sliderThumbActive('.slider__images--offer01', '.slider-thumb__images--offer01')
    sliderThumbActive('.slider__images--offer02', '.slider-thumb__images--offer02')
  } else {
    sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
  }
}
if (sliderSquer || sliderImageHorizont) {
  sliderImageActive('.slider__square')
  sliderImageActive('.slider__image-horizont')
}

let imageModals = document.querySelectorAll('.image-4x3')
let videoModals = document.querySelectorAll('.youtube')
  
imageModals.forEach(el => {
  if (el.classList.contains('image-one')) {
    oneElement()
    console.log(el)
  }
})

videoModals.forEach(el => {
  if (el.classList.contains('video-one')) {
    oneElement()
    console.log(el)
  }
})
function oneElement() {
  document.querySelector('.swiper-button-prev').style.display = "none"
  document.querySelector('.swiper-button-next').style.display = "none"
  document.querySelector('.slider-thumb').style.height = "0"
  document.querySelector('.slider-thumb').style.minHeight = "0"
}

function sliderModals(modal) {
  carousel = new bootstrap.Carousel(modal, {
    // interval: 2000,
    touch: true
  })
}


modalItem.forEach(modal => {
    modal.addEventListener('show.bs.modal', function (e) {
      if (this.querySelector('.iframe')) {
        videoIframe = this.querySelector('.iframe')
        videoURL = videoIframe.getAttribute('src')
        srcUrl = videoURL+srcModal
        videoIframe.setAttribute('src', srcUrl)
      }
      let invoker = e.relatedTarget
      sliderImagesModals.forEach(el => {
        sliderModals(el)
        carousel.to(invoker.getAttribute('data-slider')) 
        el.addEventListener('slid.bs.carousel', function(e) {
         
          let currentSlide = this.querySelector('.carousel-item.active')
          // videoIframe = this.querySelector('.iframe')
          if (currentSlide && videoIframe) {
            let videoURLa = videoIframe.getAttribute('src');
            if (videoURL === videoIframe.setAttribute('src', srcUrl)) {
              videoIframe.setAttribute('src', videoURLa)
            } 
            if (videoIframe && videoIframe.setAttribute('src', videoURL)) {
              videoIframe.setAttribute('src', srcUrl)
            }
           
          }
        })
      })
      hideIframe()
    })
    modal.addEventListener('hidden.bs.modal', function(e) {
      if (this.querySelector('.iframe')) {
        iframeUrl = this.querySelector('.iframe')
        iframeUrl.setAttribute('src', videoURL)
      }
    });
}) 

function hideIframe() {
  ImageYoutubes.forEach(video => {
    let videoEl = video.querySelectorAll('.iframe')
    videoEl.forEach(el => {
        el.setAttribute('src', el.src)
    })
  })
}

//modals
// function sliderModals(modal) {
//   carousel = new bootstrap.Carousel(modal, {
//     touch: true
//   })
// }

// modalItem.forEach(modal => {
//   if(modal) {
//     modal.addEventListener('show.bs.modal', function (e) {
//       let invoker = e.relatedTarget
//       if (this.querySelector('.iframe')) {
//         videoIframe = this.querySelector('.iframe')
//         videoURL = videoIframe.getAttribute('src')
//         srcUrl = videoURL+srcModal
//         videoIframe.setAttribute('src', srcUrl)
//       }

//       sliderImagesModals.forEach(slider => {
//         sliderModals(slider)
//         carousel.to(invoker.getAttribute('data-slider') - 1)
//         slider.addEventListener('slid.bs.carousel', function(e) {

//         let currentSlide = this.querySelector('.carousel-item')
//           if (currentSlide && this.querySelector('.iframe')) {
//             videoIframe = this.querySelector('.iframe')
//             let videoURLa = videoIframe.getAttribute('src');
//             if (videoURL === videoIframe.setAttribute('src', srcUrl)) {
//               videoIframe.setAttribute('src', videoURLa)
//             } 
//             if (videoIframe && videoIframe.setAttribute('src', videoURL)) {
//               videoIframe.setAttribute('src', srcUrl)
//             }
//           }
//       })
//       hideIframe()
//     })
//     modal.addEventListener('hidden.bs.modal', function(e) {
//       iframeUrl = this.querySelector('.iframe')
//       iframeUrl.setAttribute('src', videoURL)
//     });
//   })

//   }
// })

// function hideIframe() {
//   ImageYoutubes.forEach(video => {
//     let videoEl = video.querySelectorAll('.iframe')
//     videoEl.forEach(el => {
//         el.setAttribute('src', el.src)
//     })
//   })
// }

if (youtubes.length > 0) {
  youtubes.forEach (thumb => {
    iframeThumb = thumb.querySelector('.iframe')
    urlThumb = iframeThumb.getAttribute('src')
    let urlId = YouTubeGetID(urlThumb)
    let srcLoop = `?rel=0&autoplay=1&loop=1&mute=1&start=10&end=40&controls=0&cc_load_policy=3&iv_load_policy=3&playlist=${urlId}`
    let urlPlay = urlThumb + srcLoop
    console.log(urlThumb)
    console.log(urlPlay)
    
    if (urlThumb !== null) {
      iframeThumb.setAttribute('src', urlPlay)
      console.log(iframeThumb)
    }
      
  })
}

function YouTubeGetID(url){
  if (url) {
    url = url.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    return (url[2] !== undefined) ? url[2].split(/[^0-9a-z_\-]/i)[0] : url[2];
  }
}
}
//togglepassword
if (document.querySelector('.registration-form')) {
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('.password-eye');

  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    const icon = this.getAttribute('class') === 'fa-regular fa-eye-slash' ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
    this.setAttribute('class', icon);
  });
}
//popup
const staticBackdrop = document.getElementById('staticBackdrop')
const staticBackdropVidio = document.getElementById('staticBackdropVidio')
if (staticBackdropVidio) {
    staticBackdropVidio.addEventListener('show.bs.modal', event => {
    const iframe = event.relatedTarget
    const recipient = iframe.getAttribute('data-bs-gallery')
    const modalBodyIframe = staticBackdropVidio.querySelector('.modal-body iframe')
    modalBodyIframe.src = recipient
  })
}

if (staticBackdrop) {
    staticBackdrop.addEventListener('show.bs.modal', event => {
    const img = event.relatedTarget
    const recipient = img.getAttribute('data-bs-gallery')
    const modalBodyImg = staticBackdrop.querySelector('.modal-body img')
    modalBodyImg.src = recipient
  })
}

jQuery(function ($) {
  // Чат
  if ($('.ready-made-solutions').length) {
    $('.pch-project-chat').removeClass('hide')
    $('.pch-project-chat').addClass('d-lg-block')
    $('.pch-project-chat.d-lg-block').addClass('d-none')
    $(window).on('scroll',function(){
        let result
        var smallScreen = window.matchMedia("(min-width: 992px)");
        if (smallScreen.matches){
            result = $('.ready-made-solutions').position().top
            $('.pch-project-chat').css('margin-top', result)
        } else {
            $('.pch-project-chat').css('margin-top', '0')
        }
        
      })
      $(window).trigger('scroll')
  } else {
    $('.pch-project-chat').removeClass('d-lg-block')
    $('.pch-project-chat').addClass('hide')
  }
}); // jQuery End


// Счётчик корзины
const cardBlocks = document.querySelectorAll(".mrk-cart-quantity")

const quantityHTML = `
<div class="quantity btn btn-outline-primary d-flex justify-content-center align-items-center">
<button type="button" class="minus input-group-text border-0 text-primary py-0">-</button>	<label class="screen-reader-text" >Количество товара</label>
<input type="number" class="input-text qty text border-0 text-primary py-0" name="cart[111][qty]" value="1" aria-label="Количество товара" size="4" min="0" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
<button type="button" class="plus input-group-text border-0 text-primary py-0">+</button></div>
`

currentButton(cardBlocks, 'btn-order', quantityHTML)

function currentButton (el, classAdd, elInnerHTML) {
    el.forEach((block) => {
        block.addEventListener("click", (event) => {
            event.preventDefault();
            if (event.target.classList.contains(classAdd)) {
                block.innerHTML = elInnerHTML;
            
            }
        });
    });
}
//risize home
if (document.querySelector('.body-home')) {
  let vp,
    vidw = 640,
    vidh = 360,
    resizeTimeout;

  const resize = () => {
    const w = window,
      d = document,
      e = d.documentElement,
      g = d.getElementsByTagName("body")[0],
      iw = w.innerWidth || e.clientWidth || g.clientWidth,
      ih = w.innerHeight || e.clientHeight || g.clientHeight,
      wf = iw / vidw,
      hf = ih / vidh;

    let nw, nh, dx, dy;
    if (wf >= hf) {
      nw = iw;
      nh = vidh * wf;
      dx = 0;
      dy = -0.5 * (vidh * wf - ih);
    } else {
      nw = vidw * hf;
      nh = ih;
      dx = -0.5 * (vidw * hf - iw);
      dy = 0;
    }

    vp.style.width = `${nw}px`;
    vp.style.height = `${nh}px`;
    vp.style.transform = `translate(${dx}px, ${dy}px)`;
  };

  window.onresize = () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(resize, 200);
  };

  // Needed to set size
  vp = document.getElementById("vp");

  // Initial resize
  resize();
}

//count
document.querySelectorAll('.count .plus').forEach(item => {
    item.addEventListener('click', function () {
        ++item.parentElement.querySelector('input').value;
        if (item.parentElement.querySelector('input').value > 1) {
            item.parentElement.querySelector('.minus').classList.remove('min');
        }
    });
});
document.querySelectorAll('.count .minus').forEach(item => {
    item.addEventListener('click', function () {
        --item.parentElement.querySelector('input').value;
        if (item.parentElement.querySelector('input').value < 2) {
            item.parentElement.querySelector('input').value = 1;
            item.classList.add('min');
        }
    });
});

//bootstrap settings

if (document.querySelectorAll('[data-bs-toggle="tooltip"]')) {
  let tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
}


let b=window.innerWidth<769;const w=document.querySelector("#collapseExample2"),S=document.querySelector("#navigation"),f=document.querySelector("#buyers"),q=document.querySelector("#company"),v=document.querySelectorAll(".list-footer-item-overlay");function E(e){e.classList.contains("show")&&e.classList.remove("show")}w.classList.add("show"),S.classList.add("show"),f.classList.add("show"),q.classList.add("show"),b&&(E(w),E(S),E(f),E(q),v.forEach((e=>{e.style.display="none"}))),document.querySelectorAll(".count-content").forEach((e=>{e.addEventListener("show.bs.collapse",(e=>{const t=e.target.nextSibling.nextSibling;e.target&&(console.log(t),t.querySelector(".btn-block span").innerText="",t.querySelector(".btn-block .btn").style.maxWidth="60px",t.querySelector(".btn-block span").style.paddingLeft=0)})),e.addEventListener("hidden.bs.collapse",(e=>{const t=e.target.nextSibling.nextSibling;e.target&&(t.querySelector(".btn-block span").innerText="в корзину",t.querySelector(".btn-block span").style.paddingLeft="0.5rem",t.querySelector(".btn-block .btn").style.maxWidth="100%")}))}))})();
