function getWidth(){
    if($("body").width() < 992){
        $("#navbarNav").addClass("collapse");
    }
    else{
        $("#navbarNav").removeClass("collapse");
    }
}

getWidth();

$(window).resize(function(){
    getWidth();
});

var displayNewsletterCount = 0;
var currentPage = window.location.href;
if(currentPage.indexOf("admin") < 0){
    setTimeout(function(){ 
        $(document).on('mousemove', function(e) {
            var x = e.originalEvent.pageX;
            var y = e.originalEvent.pageY;
            if(displayNewsletterCount < 1){
                if(y < 10){
                    displayNewsletterCount ++;
                    $('#newsletterModal').modal('toggle');
                }
            }
        });
    }, 1000); 
}
