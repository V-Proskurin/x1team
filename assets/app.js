(()=>{"use strict";
let telegram = document.querySelector('.wptelegram-login-output-wrap')
if (telegram && telegram.classList.contains('container')) {
  telegram.classList.remove('container')
}

if (document.querySelectorAll('.slider').length) {

  const sliderItem = document.querySelector('.slider')
  console.log(sliderItem)
  const youtubes = document.querySelectorAll('.swiper-slide.youtube')
  const ImageYoutubes = document.querySelectorAll('.swiper-slide .youtube')
  const modalItem = document.querySelectorAll('.modal')
  const swiperSliders = document.querySelectorAll('.swiper-slide')
  const fullSliders = document.querySelectorAll('.fullscrin')
  const sliderImagesModals = document.querySelectorAll('.slider__images--modal') 
  
  const mediaQuery = window.matchMedia('(min-width: 769px)')
  
  let clicked = false
  let msnrySlider
  let isMobileWidth = window.innerWidth < 769
  let sliderThumbs
  let sliderImages
  let carousel
  let srcModal = "?rel=0&autoplay=1"
  let srcUrl
  let videoIframe
  let videoURL
  let iframeUrl
  let iframeThumb
  let urlThumb
      

  if (sliderItem.classList.contains('slider-vertical')) {
      document.querySelector('.slider-thumb__images .swiper-wrapper').classList.add('slider-grid')
      if(youtubes) {
          addYoutubes(youtubes)
      }
      masonrySlider()
  }

  if (sliderItem.classList.contains('slider-horizontal')) {
      document.querySelector('.slider-thumb__images .swiper-wrapper').classList.remove('slider-grid')
      if(youtubes) {
          removeYoutubes(youtubes)
      }
      masonrySliderDelete()
  }

  swiperSliders.forEach((swiper) => {
      getOffsetSlide(swiper)
      
      const swiperImage = swiper.querySelector('.image-4x3 img')
      if (swiperImage) {
          const swiperImageParent = swiperImage.parentNode.parentNode
          getOffsetParentSlide(swiperImage, swiperImageParent)  
      }
  })   
 
  function getOffsetSlide(slide) {
      if (slide.offsetWidth > slide.offsetHeight) {
          slide.classList.add('slider-horizont')
          slide.classList.remove('slider-vertic')
      } 
       if (slide.offsetWidth <= slide.offsetHeight) {
          slide.classList.remove('slider-horizont')
          slide.classList.add('slider-vertic')
      }
  }

  function getOffsetParentSlide(slide, parent) {
      if (slide.offsetWidth > slide.offsetHeight) {
          parent.classList.add('slider-horizont')
          parent.classList.remove('slider-vertic')
      } 
      if (slide.offsetWidth <= slide.offsetHeight) {
          parent.classList.remove('slider-horizont')
          parent.classList.add('slider-vertic')
      }
  }
 
  getSliderView(fullSliders)
  getSliderView(swiperSliders)

  // if (window.matchMedia('(max-width: 769px)').matches) {
  //     document.querySelector('.slider.slider-vertical').classList.remove('slider-vertical')
  //     if (document.querySelector('.slider.slider-vertical.slider-card')) {
  //         document.querySelector('.slider.slider-vertical.slider-card').classList.remove('slider-vertical')
  //     }
  //     document.querySelector('.slider-thumb__images .swiper-wrapper').classList.remove('slider-grid')
  //     removeYoutubes(youtubes)
  //     masonrySliderDelete()
  // }

  function sliderThumbActive(images, thumbs) {
      if (images && thumbs) {
      
      sliderThumbs = new Swiper(thumbs, {
          direction: getDirection(),
          slidesPerView: 'auto',
          speed: 600,
          grabCursor: false,
          mousewheel: false,
          spaceBetween: 10,
          on: {
          click: function () {
              clicked = true
              if (mediaQuery.matches) {
                  sliderThumbs.changeDirection(getDirection())
                  // addYoutubes(youtubes)
                  
                  if (this.clickedSlide.classList.contains('slider-horizont')) {
                      clicked = false
                      sliderThumbs.changeDirection(getDirection())
                      sliderItem.classList.remove('slider-vertical')
                      sliderItem.classList.add('slider-horizontal')
                      sliderThumbs.wrapperEl.classList.remove('slider-grid')
                      masonrySliderDelete()
                  } else if (this.clickedSlide.classList.contains('slider-vertic')) {
                      // sliderThumbs.changeDirection(getDirection())
                      sliderItem.classList.remove('slider-horizontal')
                      sliderItem.classList.add('slider-vertical')
                      sliderThumbs.wrapperEl.classList.add('slider-grid')
                      masonrySlider()
                  }

                  if (document.querySelector('.slider-grid')) {
                      this.mousewheel.disable()
                  } else {
                      this.mousewheel.enable()
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
          992: {
              direction: getDirection(),
              // allowSlideNext: false,
              // allowSlidePrev: false,
          }
          }
      })
  
      sliderImages = new Swiper(images, {
          direction: 'horizontal',
          slidesPerView: 1,
          spaceBetween: 24,
          speed: 600,
          autoHeight: false,
          mousewheel: false,
          allowTouchMove:false,
          navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          },
          on: {
              slideChange: function () {
                  hideIframe()
                  if (mediaQuery.matches) {
                      clicked = true
                      sliderThumbs.changeDirection(getDirection())

                      const index_currentSlide = this.realIndex;
                      const currentSlide = this.slides[index_currentSlide]
                      
                      if (currentSlide.classList.contains('slider-vertic')) {
                          sliderThumbs.changeDirection(getDirection())
                          sliderItem.classList.remove('slider-horizontal')
                          sliderItem.classList.add('slider-vertical')
                          sliderThumbs.wrapperEl.classList.add('slider-grid')
                          masonrySlider()
                         
                          if(youtubes) {
                              addYoutubes(youtubes)
                          }
                      } 
                      else if (currentSlide.classList.contains('slider-horizont')) {
                          clicked = false
                          sliderThumbs.changeDirection(getDirection())
                          sliderItem.classList.remove('slider-vertical')
                          sliderItem.classList.add('slider-horizontal')
                          sliderThumbs.wrapperEl.classList.remove('slider-grid')
                          masonrySliderDelete()
                          
                          if(youtubes) {
                              removeYoutubes(youtubes)
                          }
                      }
                  }
                  // } else {
                  // sliderThumbs.wrapperEl.classList.remove('slider-grid')
                  // }
                  // if (document.querySelector('.slider-grid')) {
                  //     this.mousewheel.disable()
                  // } else {
                  //     this.mousewheel.enable()
                  // }
              }
          },
          thumbs: {
          swiper: sliderThumbs
          },
          breakpoints: {
          0: {
              direction: 'horizontal',
              autoHeight: true,
              mousewheel: true,
              keyboard: true,
              allowSlidePrev: true,
              allowSlideNext: true,
              allowTouchMove:true,
          },
          // 800: {
          //     autoHeight: true,
          //     allowTouchMove: false,
          // },
          992: {
              direction: getDirection(),
              autoHeight: true,
              allowTouchMove: false,
          }
          },
      })
  
      }
  }
  
  function getSliderView(slider) {
      let i
      for(i=0; i < slider.length; i++) {
          if (i != 0) {
              slider[i].setAttribute('data-slider', i)
              
          } else {
              slider[i].setAttribute('data-slider', '0')
          }
      }
  }

  function getDirection() {
      let direction = clicked ? 'vertical' : 'horizontal'
      return direction
  }
      
  function masonrySlider() {
      msnrySlider = new Masonry( document.querySelector('.slider-grid'), {
          itemSelector: '.swiper-slide',
          gutter: 10,
          columnWidth: 110,
          percentPosition: true,
      })
      msnrySlider.layout()
          
  }

  
  function masonrySliderDelete() {
      if (msnrySlider) msnrySlider.destroy();
  }
   
  function sliderModals(modal) {
      carousel = new bootstrap.Carousel(modal, {
      // interval: 2000,
      touch: true
      })
  }
      
  // вывод модального окна
  modalItem.forEach(modal => {
      modal.addEventListener('show.bs.modal', function (e) {
          if (this.querySelector('.iframe')) {
              videoIframe = this.querySelector('.iframe')
              videoURL = videoIframe.getAttribute('src')
              srcUrl = videoURL+srcModal
              const currentSlide = this.querySelector('.carousel-item.active')
                  
          if (currentSlide.querySelector('.iframe')) {
              videoIframe.setAttribute('src', srcUrl)
          }}
          let invoker = e.relatedTarget
          
          sliderImagesModals.forEach(el => {
          sliderModals(el)
          carousel.to(invoker.getAttribute('data-slider')) 
          
          if (!this.querySelector('.iframe')) {
              this.querySelector('.carousel-item').classList.add('active') 
              console.log(carousel.to(invoker.getAttribute('data-slider')) )
          } 
  
          el.addEventListener('slid.bs.carousel', function(e) {
              const currentSlide = this.querySelector('.carousel-item.active')
              if (currentSlide && videoIframe) {

                  let videoURLa = videoIframe.getAttribute('src')
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

  function addYoutubes(youtube) {
      if (youtube.length > 0) {
          youtube.forEach(el => {
              el.classList.add('ratio-16x9')
          })
      }
  }

  function removeYoutubes(youtube) {
      if (youtube.length > 0) {
          youtube.forEach(el => {
              el.classList.remove('ratio-16x9')
          })
      }
  }

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

  if (document.querySelectorAll('.slider__images--main') && document.querySelectorAll('.slider-thumb__images--main')) {
      if (isMobileWidth) {
      sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
      } else {
      sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
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
