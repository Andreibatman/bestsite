//TO DO - rewrite in pure JS instead of JS/Jquery mix

jQuery(document).ready(function($) {
    $('.gradivisimage img').click(function(event) {
        // detect data-id for later
        var id = $(this).data('id');
        // grab src to replace #featured
        var src = $(this).attr('src');
        // set featured image
        var img = $('#featured img');

//use JS to fade images in & out
        img.fadeOut('fast', function() {
            $(this).attr({src: src,});
            $(this).fadeIn('fast');
        });
    });
});


// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
img.onclick = function(){
modal.style.display = "block";
modalImg.src = this.src;
modalImg.alt = this.alt;

}


// When the user clicks on <span> (x), close the modal
modal.onclick = function() {
img01.className += " out";
setTimeout(function() {
modal.style.display = "none";
img01.className = "modal-content";
}, 400);

}