async function openPopupQuickViewBlog(id) {
    let popup = $(/*html*/`
        <div class="mfp-wrap mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;">
            <div class="mfp-container mfp-ajax-holder mfp-s-ready">
                <div id="popupOverviewView__content" class="mfp-content">
                </div>
                <div class="mfp-preloader"><div class="loader"></div></div>
            </div>
            <button id="popupOverviewBlog__close" title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    `);

    popup.find('#popupOverviewBlog__close').click(function (e) { 
        e.preventDefault();
        popup.remove();
    });

    $('body').append(popup);

    (async()=>{
        const content = await $.ajax({
            type: "get",
            url: "/components/modal/quick_view_blog/" + id,
        });
        popup.find('#popupOverviewView__content').html(content);
    })();
}