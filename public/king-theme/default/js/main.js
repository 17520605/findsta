$(document).ready(function () {
  kinglazyload();
  mansoryLoad()
  function mansoryLoad() {
    if (typeof Masonry !== "undefined") {
      var container = document.querySelector(".king-part-q-list .container");
      var msnry = new Masonry(container, {
        columnWidth: ".grid-sizer",
        itemSelector: ".box",
        percentPosition: true,
        visibleStyle: { transform: "translateY(0)", opacity: 1 },
        hiddenStyle: { transform: "translateY(100px)", opacity: 0 },
      });
      var ias = $.ias({
        container: ".container",
        item: ".box",
        pagination: ".king-page-links-list",
        next: ".king-page-next",
        delay: 300,
        negativeMargin: 200,
      });
      ias.on("render", function (items) {
        $(items).css({ opacity: 0 });
      });
      ias.on("rendered", function (items) {
        msnry.appended(items);
        kinglazyload();
        magnificPopup();
        $('[data-toggle="tooltip"]').tooltip();
      });
      ias.extension(
        new IASSpinnerExtension({
          html: '<div class="switch-loader"><span class="loader"></span></div>',
        })
      );
      ias.extension(new IASTriggerExtension({ offset: "2", text: "Load More" }));
      ias.extension(
        new IASNoneLeftExtension({
          html: '<div class="load-nomore"><span>End of the page.</span></div>',
        })
      );
    }
  }
  function magnificPopup() {
    $(".ajax-popup-link").magnificPopup({
      type: "ajax",
      closeOnBgClick: false,
      closeBtnInside: false,
      preloader: true,
      tLoading: '<div class="loader"></div>',
      removalDelay: 120,
      callbacks: {
        ajaxContentAdded: function () {
          var video = document.getElementById("my-video");
          if (video) {
            videojs(video);
          }
          kinglazyload();
          kinggallery();
        },
        parseAjax: function (mfpResponse) {
          mfpResponse.data = $(mfpResponse.data).find(
            ".king-video, .rightview, .king-part-custom"
          );
        },
      },
    });
    $(".king-listen").magnificPopup({
      type: "ajax",
      fixedContentPos: false,
      preloader: true,
      mainClass: "king-listener",
      overflowY: "scroll",
      tLoading: '<div class="loader"></div>',
      removalDelay: 120,
      callbacks: {
        ajaxContentAdded: function () {
          kingplaylist();
        },
        parseAjax: function (mfpResponse) {
          mfpResponse.data = $(mfpResponse.data).find(".king-playlist");
        },
      },
    });
    $(".ajax-popup-share").magnificPopup({
      type: "ajax",
      closeOnBgClick: false,
      closeBtnInside: false,
      preloader: true,
      tLoading: '<div class="loader"></div>',
      removalDelay: 120,
      callbacks: {
        parseAjax: function (mfpResponse) {
          mfpResponse.data = $(mfpResponse.data).find(".social-share");
        },
      },
    });
  }
  magnificPopup();
  function kinglazyload() {
    var lazyItems = [].slice.call(
      document.querySelectorAll("[data-king-img-src]")
    );
    if ("IntersectionObserver" in window) {
      var options = { rootMargin: "300px" };
      var lazyItemObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var lazyItem = entry.target;
            var imgSrc = lazyItem.getAttribute("data-king-img-src");
            if (imgSrc) {
              if (lazyItem.classList.contains("king-lazy")) {
                lazyItem.addEventListener("load", function () {
                  lazyItem.style.height = "";
                  lazyItem.style.width = "";
                  lazyItem.classList.add("loaded");
                  lazyItem.removeAttribute("data-king-img-src");
                  lazyItemObserver.unobserve(lazyItem);
                });
                lazyItem.src = imgSrc;
                var srcset = lazyItem.getAttribute("data-king-img-srcset");
                if (srcset) {
                  lazyItem.setAttribute("srcset", srcset);
                  lazyItem.removeAttribute("data-king-img-srcset");
                }
                lazyItem.parentNode.classList.add("img-loaded");
              } else {
                lazyItem.style.backgroundImage = "url('" + imgSrc + "')";
                lazyItem.classList.add("loaded");
                lazyItem.removeAttribute("data-king-img-src");
                lazyItemObserver.unobserve(lazyItem);
              }
            }
          }
        });
      }, options);
      lazyItems.forEach(function (lazyItem) {
        lazyItemObserver.observe(lazyItem);
      });
    } else {
      lazyItems.forEach(function (lazyItem) {
        if (lazyItem.classList.contains("king-lazy")) {
          lazyItem.style.height = "";
          lazyItem.style.width = "";
          lazyItem.src = lazyItem.getAttribute("data-king-img-src");
          var srcset = lazyItem.getAttribute("data-king-img-srcset");
          if (srcset) {
            lazyItem.setAttribute("srcset", srcset);
            lazyItem.removeAttribute("data-king-img-srcset");
          }
          lazyItem.parentNode.classList.add("img-loaded");
          lazyItem.classList.add("loaded");
          lazyItem.removeAttribute("data-king-img-src");
        } else {
          lazyItem.style.backgroundImage =
            "url('" + lazyItem.getAttribute("data-king-img-src") + "')";
          lazyItem.classList.add("loaded");
          lazyItem.removeAttribute("data-king-img-src");
        }
      });
    }
  }
  $(".search-toggle").click(function (event) {
    $("div.king-search").find(".king-search-field").focus();
  });
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  $(".king-nightb").click(function (e) {
    e.stopPropagation();
  });
  $("#modal-url").click(function () {
    $(this).focus();
    $(this).select();
    document.execCommand("copy");
    $(this).next(".copied").show();
  });
  function kingplaylist() {
    var d = document.querySelector(".king-playlist-data");
    if (d) {
      var videoList = JSON.parse(d.innerHTML);
      var player = videojs(document.querySelector(".video-js"), {
        controlBar: {
          fullscreenToggle: false,
          volumePanel: { inline: false, volumeControl: { vertical: true } },
        },
        inactivityTimeout: 0,
      });
      try {
        player.volume(1);
      } catch (e) {}
      player.playlist(videoList);
      player.playlist.autoadvance(0);
      var Button = videojs.getComponent("Button");
      var PrevButton = videojs.extend(Button, {
        constructor: function () {
          Button.apply(this, arguments);
          this.addClass("icon-angle-left");
          this.controlText("Previous");
        },
        handleClick: function () {
          console.log("click");
          player.playlist.previous();
        },
      });
      var NextButton = videojs.extend(Button, {
        constructor: function () {
          Button.apply(this, arguments);
          this.addClass("icon-angle-right");
          this.controlText("Next");
        },
        handleClick: function () {
          console.log("click");
          player.playlist.next();
        },
      });
      var ShowPlaylist = videojs.extend(Button, {
        constructor: function () {
          Button.apply(this, arguments);
          this.addClass("vjs-chapters-button");
          this.controlText("Show Playlist");
        },
        handleClick: function () {
          var x = document.getElementById("king-playlist");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        },
      });
      videojs.registerComponent("NextButton", NextButton);
      videojs.registerComponent("PrevButton", PrevButton);
      videojs.registerComponent("ShowPlaylist", ShowPlaylist);
      player.getChild("controlBar").addChild("PrevButton", {}, 1);
      player.getChild("controlBar").addChild("NextButton", {}, 2);
      player.getChild("controlBar").addChild("ShowPlaylist", {}, 12);
      player.playlistUi();
    }
  }
  kingplaylist();
  function kinggallery() {
    $(".king-gallery").owlCarousel({
      nav: !0,
      margin: 14,
      autoWidth: true,
      center: false,
      loop: false,
      items: 2,
      navText: [
        '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
        '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
      ],
      responsive: { 0: { items: 1 }, 600: { items: 1, autoHeight: true } },
    });
  }
  kinggallery();
  $(".king-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: "king-gallery-zoom",
    gallery: { enabled: true },
    zoom: {
      enabled: true,
      duration: 300,
      opener: function (element) {
        return element.find("img");
      },
    },
  });
  var owl = $(".owl-carousel");
  owl.owlCarousel({
    nav: true,
    dots: false,
    margin: 14,
    mouseDrag: false,
    loop: false,
    items: 1,
    singleItem: true,
    center: true,
    animateOut: "slideOutDown",
    animateIn: "slideInDown",
    navContainerClass: "shorts-nav",
    navText: [
      '<i class="fa-solid fa-circle-chevron-up"></i>',
      '<i class="fa-solid fa-circle-chevron-down"></i>',
    ],
  });
  owl.on("translated.owl.carousel", function (event) {
    $(".short-video").each(function () {
      videojs(this.id).ready(function () {
        this.pause();
        this.currentTime(0);
      });
    });
    $(".owl-item.active .short-video").each(function () {
      videojs(this.id).ready(function () {
        this.play();
        var volume = localStorage.getItem("svolume");
        if (volume !== null) {
          this.muted("true" === volume);
        }
      });
      videojs(this.id).on("volumechange", function () {
        localStorage.setItem("svolume", this.muted());
      });
    });
  });
  var d = document.querySelector(".short-video");
  if (d) {
    videojs(d).on("volumechange", function () {
      localStorage.setItem("svolume", this.muted());
    });
  }
  window.setTimeout(function() {
    mansoryLoad()
  }, 1000);
});
